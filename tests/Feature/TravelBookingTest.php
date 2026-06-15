<?php

use App\Models\Package;
use App\Models\Booking;
use Database\Seeders\PackageSeeder;

beforeEach(function () {
    $this->seed(PackageSeeder::class);
});

test('visitor can search and filter packages on explore page', function () {
    $response = $this->get('/destinations?category=Luxury');
    $response->assertStatus(200);
    $response->assertSee('Maldives Archipelago');
    $response->assertDontSee('Swiss Alps'); // Adventure category
});

test('visitor can view package details', function () {
    $response = $this->get('/packages/london-urbanity');
    $response->assertStatus(200);
    $response->assertSee('London Urbanity');
    $response->assertSee('Day-by-Day Journey');
});

test('visitor can access checkout page with parameters', function () {
    $response = $this->get('/checkout/maldives-archipelago?date=2026-07-01&guests=3');
    $response->assertStatus(200);
    $response->assertSee('Secure Checkout');
});

test('submitting checkout creates booking and reduces inventory', function () {
    $package = Package::where('slug', 'swiss-alps')->first();
    $initialInventory = $package->inventory;

    $response = $this->post('/checkout/swiss-alps', [
        'customer_name' => 'John Doe',
        'customer_email' => 'john.doe@example.com',
        'travel_date' => '2026-08-15',
        'guests' => 2,
        'notes' => 'Vegetarian meals preferred.'
    ]);

    // Should redirect to confirmation page
    $booking = Booking::first();
    expect($booking)->not->toBeNull();
    $response->assertRedirect(route('checkout.confirmation', $booking->id));

    // Inventory should be decremented
    $package->refresh();
    expect($package->inventory)->toBe($initialInventory - 2);
});

test('admin can change booking status and restore inventory on cancellation', function () {
    $package = Package::where('slug', 'venice-serenades')->first();
    $initialInventory = $package->inventory;

    // Create a booking manually
    $booking = Booking::create([
        'package_id' => $package->id,
        'customer_name' => 'Alice Smith',
        'customer_email' => 'alice@example.com',
        'travel_date' => '2026-09-01',
        'guests' => 2,
        'total_price' => $package->price * 2,
        'status' => 'Pending'
    ]);
    
    // Decrement inventory to simulate initial slot booking
    $package->decrement('inventory', 2);
    expect($package->fresh()->inventory)->toBe($initialInventory - 2);

    // Cancel booking via admin status update
    $response = $this->post("/admin/bookings/{$booking->id}/status", [
        'status' => 'Cancelled'
    ]);

    $response->assertSessionHas('success');
    expect($booking->fresh()->status)->toBe('Cancelled');
    
    // Inventory should be restored!
    expect($package->fresh()->inventory)->toBe($initialInventory);
});
