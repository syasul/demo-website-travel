@extends('layouts.admin')

@section('title', 'Aetheris | Manage Bookings')
@section('page_title', 'Reservations Ledger')
@section('page_subtitle', 'Review customer requests, manage status confirmations, and restore inventory slots on cancellations.')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-outline-variant/30 overflow-hidden">
    <div class="px-6 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50 flex justify-between items-center">
        <h3 class="font-headline-md text-headline-md text-primary">All Bookings</h3>
        <span class="text-sm font-semibold text-on-surface-variant bg-surface-container-high px-3 py-1 rounded-full">{{ $bookings->count() }} reservations total</span>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low text-on-surface-variant text-[11px] uppercase tracking-widest border-b border-outline-variant/30">
                    <th class="px-6 py-4 font-bold">Booking ID</th>
                    <th class="px-6 py-4 font-bold">Customer Details</th>
                    <th class="px-6 py-4 font-bold">Destination</th>
                    <th class="px-6 py-4 font-bold">Travel Date</th>
                    <th class="px-6 py-4 font-bold">Travelers</th>
                    <th class="px-6 py-4 font-bold">Total Price</th>
                    <th class="px-6 py-4 font-bold text-center">Status Manager</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/30">
                @forelse($bookings as $booking)
                <tr class="hover:bg-surface-container-lowest/55 transition-colors">
                    <!-- Booking Reference -->
                    <td class="px-6 py-4 font-mono font-bold text-sm text-primary">
                        AET-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                    </td>
                    
                    <!-- Customer details -->
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="font-bold text-primary">{{ $booking->customer_name }}</span>
                            <span class="text-xs text-on-surface-variant">{{ $booking->customer_email }}</span>
                        </div>
                    </td>
                    
                    <!-- Destination title -->
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg overflow-hidden flex-shrink-0">
                                <img class="w-full h-full object-cover" src="{{ $booking->package->image_url }}" alt="{{ $booking->package->title }}"/>
                            </div>
                            <span class="font-semibold text-primary">{{ $booking->package->title }}</span>
                        </div>
                    </td>
                    
                    <!-- Travel Date -->
                    <td class="px-6 py-4 font-medium text-primary">
                        {{ date('M d, Y', strtotime($booking->travel_date)) }}
                    </td>
                    
                    <!-- Travelers count -->
                    <td class="px-6 py-4 font-medium text-primary text-center">
                        {{ $booking->guests }}
                    </td>
                    
                    <!-- Total Price -->
                    <td class="px-6 py-4 font-bold text-primary">
                        ${{ number_format($booking->total_price) }}
                    </td>
                    
                    <!-- Status Dropdown Manager -->
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="flex items-center justify-center gap-2 max-w-[180px] mx-auto">
                            @csrf
                            <select name="status" class="bg-surface-container-low border-transparent rounded-lg py-1.5 px-3 text-xs font-semibold focus:ring-2 focus:ring-secondary/20 cursor-pointer">
                                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="bg-primary text-white p-2 rounded-lg hover:bg-secondary transition-colors" title="Apply Status">
                                <span class="material-symbols-outlined text-[16px]">check</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-4xl mb-2">calendar_today</span>
                        <p>No bookings registered in the system ledger yet.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
