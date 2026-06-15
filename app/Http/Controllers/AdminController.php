<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $totalRevenue = Booking::where('status', 'Confirmed')->sum('total_price');
        $pendingRevenue = Booking::where('status', 'Pending')->sum('total_price');
        $totalBookings = Booking::count();
        $activePackages = Package::count();
        $pendingBookings = Booking::where('status', 'Pending')->count();
        
        $recentBookings = Booking::with('package')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Calculate monthly booking counts/revenue for simple sparklines
        $revenueData = Booking::where('status', 'Confirmed')
            ->selectRaw('strftime("%m", created_at) as month, SUM(total_price) as sum')
            ->groupBy('month')
            ->pluck('sum')
            ->toArray();
            
        return view('admin.dashboard', compact(
            'totalRevenue',
            'pendingRevenue',
            'totalBookings',
            'activePackages',
            'pendingBookings',
            'recentBookings'
        ));
    }

    public function packages()
    {
        $packages = Package::all();
        return view('admin.packages', compact('packages'));
    }

    public function bookings()
    {
        $bookings = Booking::with('package')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $package = $booking->package;
        
        $validated = $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled'
        ]);
        
        $oldStatus = $booking->status;
        $newStatus = $validated['status'];
        
        if ($oldStatus !== $newStatus) {
            // If we are cancelling a booking, restore the inventory
            if ($newStatus === 'Cancelled') {
                $package->increment('inventory', $booking->guests);
            }
            // If we are moving OUT of cancelled status, check and reduce inventory
            elseif ($oldStatus === 'Cancelled') {
                if ($package->inventory < $booking->guests) {
                    return back()->withErrors(['error' => 'Cannot update status. Not enough slots available in the package.']);
                }
                $package->decrement('inventory', $booking->guests);
            }
            
            $booking->update(['status' => $newStatus]);
        }
        
        return back()->with('success', 'Booking status updated successfully.');
    }

    public function updateInventory(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $validated = $request->validate([
            'inventory' => 'required|integer|min:0|max:100'
        ]);
        
        $package->update(['inventory' => $validated['inventory']]);
        return back()->with('success', "{$package->title} inventory updated successfully.");
    }
}

