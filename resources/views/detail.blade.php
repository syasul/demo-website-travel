@extends('layouts.layout')

@section('title', 'Aetheris | ' . $package->title)

@section('content')
<main class="pt-32 pb-stack-xl max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
    <!-- Hero Gallery Section -->
    <section class="mb-stack-lg">
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[500px] md:h-[600px]">
            <!-- Main Large Image -->
            <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-[24px] group">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $package->image_url }}" alt="{{ $package->title }}"/>
                <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/70 to-transparent">
                    <h1 class="text-white font-display-lg text-3xl md:text-4xl mb-2">{{ $package->title }}</h1>
                    <p class="text-white/90 font-body-md flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">location_on</span>
                        {{ $package->location }}
                    </p>
                </div>
            </div>
            
            <!-- Grid Secondary Images (using other seeded packages to ensure premium visual quality without broken icons) -->
            @php
                $allImages = \App\Models\Package::where('id', '!=', $package->id)->pluck('image_url')->toArray();
                if (count($allImages) < 3) {
                    $allImages = array_merge($allImages, [$package->image_url, $package->image_url, $package->image_url]);
                }
            @endphp
            <div class="relative overflow-hidden rounded-[24px] group hidden md:block">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $allImages[0] }}" alt="Experience Scene 1"/>
            </div>
            <div class="relative overflow-hidden rounded-[24px] group hidden md:block">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $allImages[1] }}" alt="Experience Scene 2"/>
            </div>
            <div class="md:col-span-2 relative overflow-hidden rounded-[24px] group hidden md:block">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $allImages[2] }}" alt="Experience Scene 3"/>
                <div class="absolute inset-0 flex items-center justify-center bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="bg-white/90 backdrop-blur-md text-primary px-6 py-3 rounded-full font-label-sm flex items-center gap-2">
                        <span class="material-symbols-outlined">grid_view</span> View All Photos
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Left Column: Details -->
        <div class="lg:col-span-8 space-y-stack-lg">
            <!-- Overview -->
            <div class="space-y-4">
                <h2 class="font-headline-md text-headline-md text-primary">Experience the Height of Curated Luxury</h2>
                <p class="font-body-lg text-on-surface-variant max-w-3xl leading-relaxed">
                    {{ $package->description }}
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <span class="px-4 py-2 bg-secondary-container text-on-secondary-container rounded-full font-label-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">spa</span> Wellness Retreat
                    </span>
                    <span class="px-4 py-2 bg-secondary-container text-on-secondary-container rounded-full font-label-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">concierge</span> Butler Service
                    </span>
                    <span class="px-4 py-2 bg-secondary-container text-on-secondary-container rounded-full font-label-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">restaurant</span> Michelin Standard Dining
                    </span>
                </div>
            </div>
            
            <!-- Itinerary Accordion -->
            <div class="space-y-6 pt-6">
                <h3 class="font-headline-md text-headline-md text-primary border-b border-outline-variant/20 pb-4">Day-by-Day Journey</h3>
                <div class="space-y-3">
                    @foreach($package->itinerary as $index => $step)
                    <div class="group border border-outline-variant rounded-2xl overflow-hidden bg-white transition-all hover:shadow-md">
                        <button class="w-full flex items-center justify-between p-6 text-left focus:outline-none" onclick="toggleAccordion('day{{ $step['day'] }}')">
                            <div class="flex items-center gap-4">
                                <span class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">{{ $step['day'] }}</span>
                                <div>
                                    <h4 class="font-headline-md text-body-lg font-bold">Day {{ $step['day'] }}: {{ $step['title'] }}</h4>
                                </div>
                            </div>
                            <span class="material-symbols-outlined transition-transform duration-300" id="icon-day{{ $step['day'] }}">expand_more</span>
                        </button>
                        <div class="hidden px-6 pb-6 pt-0 text-on-surface-variant border-t border-outline-variant/30" id="day{{ $step['day'] }}">
                            <p class="font-body-md py-4 leading-relaxed">{{ $step['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- What's Included -->
            <div class="bg-surface-container-low rounded-[32px] p-8 mt-6">
                <h3 class="font-headline-md text-headline-md text-primary mb-8 border-b border-outline-variant/20 pb-4">What's Included</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($package->what_is_included as $includedItem)
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary p-2 bg-secondary-container rounded-lg">verified</span>
                        <div>
                            <h5 class="font-bold text-primary">{{ $includedItem }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Right Column: Booking Sidebar -->
        <div class="lg:col-span-4 relative">
            <div class="sticky top-28 space-y-6">
                <div class="bg-white border border-outline-variant rounded-[32px] p-8 shadow-xl">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <p class="text-on-surface-variant font-label-sm uppercase tracking-widest text-xs">Total Package</p>
                            <p class="text-primary font-display-lg text-3xl font-bold">${{ number_format($package->price) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-secondary font-bold">{{ $package->duration }}</p>
                            <p class="text-xs text-on-surface-variant">Per Guest</p>
                        </div>
                    </div>
                    
                    <!-- Prefill form fields for checkout -->
                    <form action="{{ route('checkout.show', $package->slug) }}" method="GET" class="space-y-4 mb-8">
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase text-on-surface-variant ml-1">Departure Date</label>
                            <div class="relative">
                                <input name="date" class="w-full bg-surface-container-low border-none rounded-xl px-10 py-3 text-on-surface focus:ring-2 focus:ring-secondary/20" 
                                       type="date" required value="{{ date('Y-m-d', strtotime('+7 days')) }}"/>
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">calendar_month</span>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase text-on-surface-variant ml-1">Travelers</label>
                            <div class="relative">
                                <select name="guests" class="w-full bg-surface-container-low border-none rounded-xl px-10 py-3 text-on-surface focus:ring-2 focus:ring-secondary/20 appearance-none cursor-pointer">
                                    @for($i = 1; $i <= min($package->inventory, 8); $i++)
                                    <option value="{{ $i }}" {{ $i == 2 ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Traveler' : 'Travelers' }}</option>
                                    @endfor
                                </select>
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">person</span>
                                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline text-lg">expand_more</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold text-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg flex items-center justify-center gap-2 mt-6">
                            Book Now <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </form>
                    
                    <p class="text-center text-xs text-on-surface-variant px-4">
                        No immediate payment required. Our concierge will contact you within 12 hours to confirm your booking dates.
                    </p>
                </div>
                
                <!-- Trust Badge -->
                <div class="bg-surface-container rounded-2xl p-6 flex flex-col items-center text-center gap-4">
                    <div class="flex -space-x-2">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-secondary flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-on-tertiary-container flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <p class="text-sm font-bold text-primary">Curated by World Travel Awards Winner</p>
                    <p class="text-xs text-on-surface-variant">Includes full cancellation coverage up to 14 days before departure.</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    function toggleAccordion(id) {
        const element = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        
        // Hide all details
        document.querySelectorAll('[id^="day"]').forEach(acc => {
            if (acc.id === id) {
                if (acc.classList.contains('hidden')) {
                    acc.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    acc.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            } else {
                acc.classList.add('hidden');
                const otherIcon = document.getElementById('icon-' + acc.id);
                if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
            }
        });
    }

    // Auto-open first day
    document.addEventListener('DOMContentLoaded', () => {
        toggleAccordion('day1');
    });
</script>
@endsection
