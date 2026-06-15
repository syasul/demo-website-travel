@extends('layouts.admin')

@section('title', 'Aetheris | Admin Dashboard')
@section('page_title', 'Portfolio Insights')
@section('page_subtitle', 'Here\'s your luxury performance summary.')

@section('content')
<!-- Stats Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-stack-xl">
    <!-- Total Revenue -->
    <div class="glass-card p-stack-md rounded-3xl shadow-sm hover:shadow-md transition-all group">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-secondary-container rounded-2xl text-on-secondary-container">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
            </div>
            <span class="text-secondary font-bold font-label-sm">+14.2%</span>
        </div>
        <h3 class="text-on-surface-variant font-label-sm uppercase tracking-widest mb-1">Realized Revenue</h3>
        <p class="font-display-lg text-display-lg text-primary mb-1 font-bold">${{ number_format($totalRevenue) }}</p>
        <p class="text-xs text-on-surface-variant">Pending: ${{ number_format($pendingRevenue) }}</p>
    </div>
    
    <!-- Recent Bookings Count -->
    <div class="glass-card p-stack-md rounded-3xl shadow-sm hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-primary-container rounded-2xl text-on-primary-container">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">confirmation_number</span>
            </div>
            <span class="text-on-surface-variant font-label-sm">Total Bookings</span>
        </div>
        <h3 class="text-on-surface-variant font-label-sm uppercase tracking-widest mb-1">Reservation Count</h3>
        <p class="font-display-lg text-display-lg text-primary mb-2 font-bold">{{ $totalBookings }}</p>
        <p class="text-xs text-on-surface-variant">Active packages online: {{ $activePackages }}</p>
    </div>
    
    <!-- Pending Bookings Alert -->
    <div class="glass-card p-stack-md rounded-3xl shadow-sm hover:shadow-md transition-all">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-tertiary-fixed rounded-2xl text-on-tertiary-fixed">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">explore</span>
            </div>
            <div class="flex items-center gap-1 text-on-tertiary-container font-bold font-label-sm">
                <span class="material-symbols-outlined text-[14px]">sensors</span>
                Live Action
            </div>
        </div>
        <h3 class="text-on-surface-variant font-label-sm uppercase tracking-widest mb-1">Pending Requests</h3>
        <p class="font-display-lg text-display-lg text-primary font-bold">{{ $pendingBookings }}</p>
        <p class="text-xs text-on-surface-variant">Requires manual concierge attention</p>
    </div>
</div>

<!-- Recent Activity Section -->
<section class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
    <!-- Activity Feed -->
    <div class="lg:col-span-2 glass-card rounded-3xl shadow-sm overflow-hidden bg-white">
        <div class="px-gutter py-stack-md border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest/50">
            <h2 class="font-headline-md text-headline-md text-primary">Recent Bookings</h2>
            <a href="{{ route('admin.bookings') }}" class="text-secondary font-label-sm uppercase tracking-widest hover:underline transition-all">View All Bookings</a>
        </div>
        
        <div class="divide-y divide-outline-variant">
            @forelse($recentBookings as $booking)
            <div class="p-6 flex items-center justify-between hover:bg-surface-container-low transition-colors group">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" src="{{ $booking->package->image_url }}" alt="{{ $booking->package->title }}"/>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary">{{ $booking->package->title }}</h4>
                        <p class="text-sm text-on-surface-variant">
                            Client: <span class="font-semibold text-primary">{{ $booking->customer_name }}</span> ({{ $booking->guests }} guests)
                        </p>
                        <p class="text-xs text-on-surface-variant/80 mt-1">Travel Date: {{ date('F d, Y', strtotime($booking->travel_date)) }}</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="font-bold text-primary mb-1">${{ number_format($booking->total_price) }}</p>
                        <span class="px-3 py-1 text-[11px] font-bold rounded-full uppercase 
                            {{ $booking->status == 'Confirmed' ? 'bg-secondary-container text-on-secondary-container' : ($booking->status == 'Pending' ? 'bg-surface-container-high text-on-surface-variant' : 'bg-error-container text-on-error-container') }}">
                            {{ $booking->status }}
                        </span>
                    </div>
                    
                    <!-- Quick action buttons -->
                    @if($booking->status == 'Pending')
                    <div class="flex flex-col gap-1">
                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Confirmed"/>
                            <button type="submit" class="bg-secondary text-white text-xs px-3 py-1.5 rounded-lg font-bold hover:opacity-85 transition-opacity" title="Confirm Booking">
                                Confirm
                            </button>
                        </form>
                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Cancelled"/>
                            <button type="submit" class="border border-error text-error text-xs px-3 py-1.5 rounded-lg font-bold hover:bg-error/10 transition-colors" title="Cancel Booking">
                                Cancel
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="p-12 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl mb-2">inbox</span>
                <p>No recent bookings registered yet.</p>
            </div>
            @endforelse
        </div>
    </div>
    
    <!-- Featured Inventory / Quick Stats -->
    <div class="flex flex-col gap-gutter">
        <div class="glass-card rounded-3xl p-stack-md shadow-sm bg-white">
            <h3 class="font-headline-md text-headline-md text-primary mb-4 border-b border-outline-variant/20 pb-2">Inventory Health</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-on-surface-variant font-medium">Baa Atoll Occupancy</span>
                        <span class="font-bold text-primary">80% Occupied</span>
                    </div>
                    <div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
                        <div class="h-full bg-secondary animate-pulse" style="width: 80%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-on-surface-variant font-medium">Mayfair Suites Availability</span>
                        <span class="font-bold text-primary">60% Booked</span>
                    </div>
                    <div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
                        <div class="h-full bg-secondary-fixed-dim" style="width: 60%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-on-surface-variant font-medium">Zermatt Chalets Rating</span>
                        <span class="font-bold text-primary">98% Satisfied</span>
                    </div>
                    <div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden">
                        <div class="h-full bg-secondary" style="width: 98%;"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-3xl p-stack-md shadow-sm bg-primary text-white relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-secondary opacity-20 rounded-full blur-2xl"></div>
            <div class="relative z-10">
                <h3 class="font-headline-md text-headline-md mb-2 flex items-center gap-2 text-white">
                    <span class="material-symbols-outlined text-white">notifications_active</span>
                    Concierge Alert
                </h3>
                <p class="text-sm opacity-90 mb-4 leading-relaxed">VIP customer requested custom yacht catering at Maldives for next week. Review booking specifications.</p>
                <button class="px-4 py-2.5 bg-white text-primary font-bold rounded-lg text-xs hover:bg-secondary-fixed transition-colors">
                    Acknowledge
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
