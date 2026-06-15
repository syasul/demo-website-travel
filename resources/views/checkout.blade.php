@extends('layouts.layout')

@section('title', 'Aetheris | Secure Checkout')

@section('content')
@php
    $selectedDate = request('date', date('Y-m-d', strtotime('+7 days')));
    $selectedGuests = intval(request('guests', 2));
    if ($selectedGuests < 1) $selectedGuests = 2;
    if ($selectedGuests > $package->inventory) $selectedGuests = $package->inventory;
@endphp

<main class="pt-32 pb-stack-xl max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
    @if ($errors->any())
    <div class="mb-6 p-4 bg-error-container text-on-error-container rounded-2xl border border-error/20">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li class="text-error font-medium">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        <!-- Left Column: Forms -->
        <div class="lg:col-span-7 space-y-stack-md">
            <form id="checkout-form" action="{{ route('checkout.store', $package->slug) }}" method="POST" class="space-y-6">
                @csrf
                <!-- Contact Information -->
                <section class="bg-white p-stack-md rounded-2xl border border-outline-variant/30 shadow-sm">
                    <div class="flex items-center gap-stack-sm mb-stack-md">
                        <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-primary-fixed">
                            <span class="material-symbols-outlined text-lg">person</span>
                        </div>
                        <h2 class="font-headline-md text-headline-md text-primary">Contact Information</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2 space-y-1">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Full Name</label>
                            <input name="customer_name" class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" 
                                   placeholder="Julian Evergreen" type="text" required value="{{ old('customer_name') }}"/>
                        </div>
                        <div class="md:col-span-2 space-y-1">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Email Address</label>
                            <input name="customer_email" class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" 
                                   placeholder="julian.evergreen@concierge.com" type="email" required value="{{ old('customer_email') }}"/>
                        </div>
                    </div>
                </section>
                
                <!-- Travel Details -->
                <section class="bg-white p-stack-md rounded-2xl border border-outline-variant/30 shadow-sm">
                    <div class="flex items-center gap-stack-sm mb-stack-md">
                        <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
                            <span class="material-symbols-outlined text-lg">group</span>
                        </div>
                        <h2 class="font-headline-md text-headline-md text-primary">Traveler Details</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Departure Date</label>
                                <input name="travel_date" class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" 
                                       type="date" required value="{{ old('travel_date', $selectedDate) }}"/>
                            </div>
                            <div class="space-y-1">
                                <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Travelers Count</label>
                                <select id="guest-select" name="guests" class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20 appearance-none cursor-pointer">
                                    @for($i = 1; $i <= $package->inventory; $i++)
                                    <option value="{{ $i }}" {{ $i == $selectedGuests ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Traveler' : 'Travelers' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Special Requirements (Optional)</label>
                            <textarea name="notes" class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20 resize-none" 
                                      placeholder="Dietary restrictions, preferred villa location, airport pickup flight details..." rows="3">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </section>
                
                <!-- Payment Simulation Details -->
                <section class="bg-white p-stack-md rounded-2xl border border-outline-variant/30 shadow-sm">
                    <div class="flex items-center justify-between mb-stack-md">
                        <div class="flex items-center gap-stack-sm">
                            <div class="w-10 h-10 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">payments</span>
                            </div>
                            <h2 class="font-headline-md text-headline-md text-primary">Payment Details</h2>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-xs text-on-surface-variant uppercase tracking-wider">Demo Sandbox</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Cardholder Name</label>
                            <input class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20 uppercase" placeholder="JULIAN EVERGREEN" type="text" value="JULIAN EVERGREEN"/>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1 relative">
                                <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Card Number</label>
                                <input class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" placeholder="4111 2222 3333 4444" type="text" value="4111 2222 3333 4444"/>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="space-y-1">
                                    <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">Expiry</label>
                                    <input class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" placeholder="12 / 29" type="text" value="12 / 29"/>
                                </div>
                                <div class="space-y-1">
                                    <label class="font-label-sm text-label-sm text-on-surface-variant ml-1">CVV</label>
                                    <input class="w-full bg-surface-container-low border-transparent rounded-lg py-3 px-4 focus:ring-2 focus:ring-secondary/20" placeholder="123" type="password" value="123"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-stack-md pt-stack-md border-t border-outline-variant/30">
                        <div class="flex items-start gap-3 text-on-surface-variant text-sm">
                            <span class="material-symbols-outlined text-secondary text-lg">verified_user</span>
                            <p>This is a payment sandbox simulation. Your card will not be charged. Confirming will create a pending reservation in our database.</p>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        
        <!-- Right Column: Order Summary (Sticky) -->
        <aside class="lg:col-span-5 lg:sticky lg:top-32">
            <div class="bg-on-background text-surface p-stack-md rounded-2xl relative overflow-hidden shadow-xl">
                <!-- Subtle background decoration -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-secondary opacity-15 rounded-full blur-3xl"></div>
                <h3 class="font-headline-md text-headline-md mb-stack-md relative z-10 text-white">Reservation Summary</h3>
                
                <!-- Trip Preview -->
                <div class="flex gap-4 mb-stack-md relative z-10 border-b border-surface-variant/20 pb-6">
                    <div class="w-24 h-24 rounded-xl overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" src="{{ $package->image_url }}" alt="{{ $package->title }}"/>
                    </div>
                    <div class="flex flex-col justify-center">
                        <p class="font-label-sm text-label-sm text-secondary-fixed uppercase tracking-widest">{{ $package->duration }}</p>
                        <h4 class="font-body-lg text-body-lg font-bold text-white">{{ $package->title }}</h4>
                        <p class="text-surface-variant text-sm mt-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            {{ $package->location }}
                        </p>
                    </div>
                </div>
                
                <!-- Calculations Breakdown -->
                <div class="space-y-4 relative z-10 text-surface-variant">
                    <div class="flex justify-between items-center">
                        <span>Base Rate (per guest)</span>
                        <span>${{ number_format($package->price) }}</span>
                    </div>
                    <div class="flex justify-between items-center font-bold text-white">
                        <span>Travelers Count</span>
                        <span id="summary-guests">{{ $selectedGuests }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Subtotal</span>
                        <span id="summary-subtotal">${{ number_format($package->price * $selectedGuests) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Luxury Surcharge & Taxes</span>
                        <span id="summary-taxes">${{ number_format(150 * $selectedGuests) }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center pt-4 mt-2 border-t border-surface-variant/30 text-white">
                        <span class="font-body-lg text-body-lg font-bold">Total Reservation</span>
                        <span id="summary-total" class="font-display-lg text-headline-md font-bold text-secondary-fixed">${{ number_format(($package->price + 150) * $selectedGuests) }}</span>
                    </div>
                </div>
                
                <div class="mt-stack-md relative z-10">
                    <button type="submit" form="checkout-form" class="w-full bg-secondary text-on-secondary font-headline-md py-4 rounded-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-2 group">
                        Confirm Reservation
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                    <p class="text-center text-xs text-surface-variant/60 mt-4">By booking, you agree to Aetheris' <a class="underline" href="#">Terms of Service</a> and <a class="underline" href="#">Cancellation Policy</a>.</p>
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection

@section('scripts')
<script>
    // Real-time pricing calculator
    const pricePerGuest = {{ $package->price }};
    const taxPerGuest = 150;
    const guestSelect = document.getElementById('guest-select');
    
    const summaryGuests = document.getElementById('summary-guests');
    const summarySubtotal = document.getElementById('summary-subtotal');
    const summaryTaxes = document.getElementById('summary-taxes');
    const summaryTotal = document.getElementById('summary-total');

    function formatCurrency(amount) {
        return '$' + amount.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }

    function recalculate() {
        const guests = parseInt(guestSelect.value);
        const subtotal = pricePerGuest * guests;
        const taxes = taxPerGuest * guests;
        const total = subtotal + taxes;

        summaryGuests.textContent = guests;
        summarySubtotal.textContent = formatCurrency(subtotal);
        summaryTaxes.textContent = formatCurrency(taxes);
        summaryTotal.textContent = formatCurrency(total);
    }

    guestSelect.addEventListener('change', recalculate);
    
    // Form processing loading effect
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        const btn = this.querySelector('button[type="submit"]');
        if (btn) {
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin mr-2">progress_activity</span> Processing...';
            btn.disabled = true;
        }
    });
</script>
@endsection
