<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\Booking;

class VisitorController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('welcome', compact('packages'));
    }

    public function explore(Request $request)
    {
        $query = Package::query();
        
        if ($request->has('category') && $request->category !== 'all' && $request->category !== '') {
            $query->where('category', $request->category);
        }
        
        if ($request->has('search') && $request->search !== '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }
        
        $packages = $query->get();
        return view('explore', compact('packages'));
    }

    public function show($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        // Also fetch featured or other packages for recommendations
        $otherPackages = Package::where('id', '!=', $package->id)->take(3)->get();
        return view('detail', compact('package', 'otherPackages'));
    }

    public function checkout($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        return view('checkout', compact('package'));
    }

    public function storeBooking(Request $request, $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'travel_date' => 'required|date|after:today',
            'guests' => 'required|integer|min:1|max:' . $package->inventory,
            'notes' => 'nullable|string',
        ], [
            'guests.max' => 'Only ' . $package->inventory . ' spots are left for this package.'
        ]);
        
        $totalPrice = $package->price * $validated['guests'];
        
        $booking = Booking::create([
            'package_id' => $package->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'travel_date' => $validated['travel_date'],
            'guests' => $validated['guests'],
            'total_price' => $totalPrice,
            'notes' => $validated['notes'] ?? null,
            'status' => 'Pending'
        ]);
        
        // Decrement package inventory
        $package->decrement('inventory', $validated['guests']);
        
        return redirect()->route('checkout.confirmation', $booking->id);
    }

    public function confirmation($id)
    {
        $booking = Booking::with('package')->findOrFail($id);
        return view('confirmation', compact('booking'));
    }
}
