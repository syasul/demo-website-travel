@extends('layouts.layout')

@section('title', 'Aetheris | Booking Confirmed')

@section('content')
<main class="pt-36 pb-stack-xl max-w-lg mx-auto px-6 text-center">
    <div class="bg-white rounded-3xl p-8 border border-outline-variant/30 shadow-2xl relative overflow-hidden">
        <!-- Success Check Circle -->
        <div class="w-20 h-20 bg-secondary rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-secondary/20">
            <span class="material-symbols-outlined text-white text-4xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        
        <h1 class="font-display-lg text-headline-md text-primary mb-2">Reservation Confirmed</h1>
        <p class="text-on-surface-variant font-body-md mb-6">Your luxury escape has been registered in our system. A concierge agent will reach out to you shortly.</p>
        
        <!-- Booking Details Card -->
        <div class="bg-surface-container-low rounded-2xl p-6 text-left space-y-4 mb-8">
            <div class="flex justify-between items-center pb-3 border-b border-outline-variant/20">
                <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Booking Reference</span>
                <span class="font-bold text-primary font-mono">AET-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-on-surface-variant">Destination</span>
                <span class="font-bold text-primary text-right">{{ $booking->package->title }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-on-surface-variant">Departure Date</span>
                <span class="font-medium text-primary">{{ date('F d, Y', strtotime($booking->travel_date)) }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-on-surface-variant">Travelers</span>
                <span class="font-medium text-primary">{{ $booking->guests }} {{ $booking->guests == 1 ? 'Guest' : 'Guests' }}</span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-outline-variant/20">
                <span class="text-sm font-bold text-primary">Total Paid (Simulation)</span>
                <span class="text-lg font-bold text-secondary">${{ number_format($booking->total_price) }}</span>
            </div>
        </div>
        
        <!-- Next Steps list -->
        <div class="text-left space-y-3 mb-8 px-2">
            <h4 class="text-xs font-bold uppercase tracking-wider text-on-surface-variant">Next Steps</h4>
            <div class="flex gap-3 items-start text-sm text-on-surface-variant">
                <span class="material-symbols-outlined text-secondary text-lg">mail</span>
                <p>Check <strong>{{ $booking->customer_email }}</strong> for a detailed copy of your itinerary.</p>
            </div>
            <div class="flex gap-3 items-start text-sm text-on-surface-variant">
                <span class="material-symbols-outlined text-secondary text-lg">call</span>
                <p>An Aetheris curator will contact you via email to finalize your flight connections and custom requirements.</p>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="space-y-3">
            <a href="{{ route('home') }}" class="w-full block bg-primary text-white py-4 rounded-xl font-bold hover:bg-secondary transition-colors duration-200">Return to Storefront</a>
            <a href="{{ route('admin.dashboard') }}" class="w-full block bg-surface-container border border-outline-variant/30 text-primary py-4 rounded-xl font-bold hover:bg-white transition-all duration-200">View in Admin Panel</a>
        </div>
    </div>
</main>
@endsection
