@extends('layouts.layout')

@section('title', 'Aetheris | Luxury Travel Redefined')

@section('content')
<!-- Hero Section -->
<header class="relative h-screen flex items-center justify-center overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('images/hero.png') }}');">
    <!-- Dark overlay for readability -->
    <div class="absolute inset-0 bg-black/45 z-0"></div>
    
    <!-- Shader Background Overlay -->
    <div class="absolute inset-0 w-full h-full z-0 opacity-40 mix-blend-screen pointer-events-none" style="display:block;">
        <canvas id="shader-canvas-ANIMATION_4" style="display:block;width:100%;height:100%"></canvas>
    </div>
    
    <!-- Hero Content Overlay -->
    <div class="relative z-10 text-center px-margin-mobile md:px-0 flex flex-col items-center">
        <!-- Signature Badge -->
        <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md border border-white/20 px-4 py-1.5 rounded-full mb-stack-sm reveal active animate-float" style="transition-delay: 100ms;">
            <span class="text-[10px] uppercase tracking-[0.25em] font-bold text-white/90">INXDVI Signature Experience</span>
        </div>
        
        <h1 class="font-display-lg text-[40px] md:text-display-lg text-white mb-stack-sm tracking-tighter reveal active">Experience the Extraordinary</h1>
        <p class="font-body-lg text-body-lg text-white/80 max-w-2xl mx-auto mb-stack-lg reveal active" style="transition-delay: 200ms;">
            Bespoke journeys curated for the discerning traveler. Discover hidden gems and luxury escapes that redefine the art of travel.
        </p>
        
        <!-- Floating Search Bar form -->
        <form action="{{ route('explore') }}" method="GET" class="max-w-4xl mx-auto glass-card rounded-full p-2 shadow-2xl flex flex-col md:flex-row items-center border border-white/50 animate-float reveal active w-full" style="transition-delay: 400ms;">
            <div class="flex-1 flex items-center px-6 py-3 w-full md:w-auto border-b md:border-b-0 md:border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary mr-3" data-icon="location_on">location_on</span>
                <div class="flex flex-col items-start w-full">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Where to?</span>
                    <input name="search" class="bg-transparent border-none p-0 focus:ring-0 text-body-md placeholder:text-outline-variant w-full" placeholder="Search destinations" type="text"/>
                </div>
            </div>
            <div class="flex-1 flex items-center px-6 py-3 w-full md:w-auto border-b md:border-b-0 md:border-r border-outline-variant/30">
                <span class="material-symbols-outlined text-secondary mr-3" data-icon="calendar_today">calendar_today</span>
                <div class="flex flex-col items-start w-full">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">When?</span>
                    <input class="bg-transparent border-none p-0 focus:ring-0 text-body-md placeholder:text-outline-variant w-full" placeholder="Add dates" type="text"/>
                </div>
            </div>
            <div class="flex-1 flex items-center px-6 py-3 w-full md:w-auto">
                <span class="material-symbols-outlined text-secondary mr-3" data-icon="group">group</span>
                <div class="flex flex-col items-start w-full">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-on-surface-variant">Guests</span>
                    <input class="bg-transparent border-none p-0 focus:ring-0 text-body-md placeholder:text-outline-variant w-full" placeholder="Add guests" type="text"/>
                </div>
            </div>
            <button type="submit" class="bg-secondary text-on-secondary h-12 w-12 md:h-14 md:w-14 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300 shrink-0 m-1">
                <span class="material-symbols-outlined" data-icon="search">search</span>
            </button>
        </form>
        
        <!-- WhatsApp Quick Link -->
        <div class="mt-6 flex items-center justify-center space-x-2 text-white/90 text-sm reveal active" style="transition-delay: 500ms;">
            <span class="material-symbols-outlined text-secondary-fixed-dim font-bold text-lg" style="font-variation-settings: 'FILL' 1;">chat</span>
            <span>Direct Booking WhatsApp:</span>
            <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="text-secondary-fixed-dim hover:text-white font-semibold transition-colors tracking-wide underline decoration-secondary-fixed-dim/40 hover:decoration-white">0813-3001-2100 (INXDVI)</a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-60">
        <span class="text-[10px] uppercase tracking-[0.3em] font-bold">Scroll</span>
        <div class="w-[1px] h-12 bg-primary/30 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1/2 bg-primary animate-[bounce_2s_infinite]"></div>
        </div>
    </div>
</header>

<main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-xl">
    <!-- Stats Section -->
    <section class="py-12 border-y border-outline-variant/20 mb-stack-xl reveal">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter text-center">
            <div class="flex flex-col items-center">
                <span class="font-display-lg text-display-lg md:text-[56px] text-secondary font-bold tracking-tight">12+</span>
                <span class="text-xs uppercase tracking-widest font-semibold text-on-surface-variant mt-2">Years of Curation</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-display-lg text-display-lg md:text-[56px] text-secondary font-bold tracking-tight">98%</span>
                <span class="text-xs uppercase tracking-widest font-semibold text-on-surface-variant mt-2">Satisfaction Rate</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-display-lg text-display-lg md:text-[56px] text-secondary font-bold tracking-tight">150+</span>
                <span class="text-xs uppercase tracking-widest font-semibold text-on-surface-variant mt-2">Hidden Escapes</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="font-display-lg text-display-lg md:text-[56px] text-secondary font-bold tracking-tight">24/7</span>
                <span class="text-xs uppercase tracking-widest font-semibold text-on-surface-variant mt-2">Concierge Care</span>
            </div>
        </div>
    </section>

    <!-- Top Destinations Section -->
    <section class="mb-stack-xl">
        <div class="flex flex-col md:flex-row justify-between items-end mb-stack-lg reveal">
            <div>
                <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Curated Escapes</span>
                <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Top Destinations</h2>
            </div>
            <a class="group flex items-center text-primary font-bold hover:text-secondary transition-colors duration-300" href="{{ route('explore') }}">
                Explore all destinations
                <span class="material-symbols-outlined ml-2 group-hover:translate-x-2 transition-transform" data-icon="arrow_forward">arrow_forward</span>
            </a>
        </div>
        
        <!-- Bento Grid of Destinations -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            @php
                $maldives = $packages->firstWhere('slug', 'maldives-archipelago');
                $london = $packages->firstWhere('slug', 'london-urbanity');
                $alps = $packages->firstWhere('slug', 'swiss-alps');
                $venice = $packages->firstWhere('slug', 'venice-serenades');
            @endphp

            <!-- Large Card (Maldives) -->
            @if($maldives)
            <div class="md:col-span-8 relative rounded-[24px] overflow-hidden group h-[500px] reveal cursor-pointer" onclick="window.location.href='{{ route('packages.show', $maldives->slug) }}'">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $maldives->image_url }}" alt="{{ $maldives->title }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60"></div>
                <div class="absolute bottom-0 left-0 right-0 p-stack-md glass-card border-t border-white/20 m-6 rounded-2xl flex justify-between items-end">
                    <div>
                        <h3 class="font-headline-md text-headline-md text-primary">{{ $maldives->title }}</h3>
                        <p class="text-on-surface-variant font-body-md">{{ $maldives->duration }} • Pristine overwater villas</p>
                    </div>
                    <div class="flex items-center text-secondary font-bold">
                        From ${{ number_format($maldives->price) }}
                    </div>
                </div>
            </div>
            @endif

            <!-- Small Card 1 (London) -->
            @if($london)
            <div class="md:col-span-4 relative rounded-[24px] overflow-hidden group h-[500px] md:h-auto reveal cursor-pointer" style="transition-delay: 100ms;" onclick="window.location.href='{{ route('packages.show', $london->slug) }}'">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $london->image_url }}" alt="{{ $london->title }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60"></div>
                <div class="absolute bottom-0 left-0 right-0 p-stack-md glass-card border-t border-white/20 m-6 rounded-2xl">
                    <h3 class="font-headline-md text-headline-md text-primary">{{ $london->title }}</h3>
                    <p class="text-on-surface-variant font-body-md">The height of sophistication</p>
                </div>
            </div>
            @endif

            <!-- Small Card 2 (Swiss Alps) -->
            @if($alps)
            <div class="md:col-span-4 relative rounded-[24px] overflow-hidden group h-[400px] reveal cursor-pointer" style="transition-delay: 200ms;" onclick="window.location.href='{{ route('packages.show', $alps->slug) }}'">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $alps->image_url }}" alt="{{ $alps->title }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60"></div>
                <div class="absolute bottom-0 left-0 right-0 p-stack-md glass-card border-t border-white/20 m-6 rounded-2xl">
                    <h3 class="font-headline-md text-headline-md text-primary">{{ $alps->title }}</h3>
                    <p class="text-on-surface-variant font-body-md">Majestic peaks & private chalets</p>
                </div>
            </div>
            @endif

            <!-- Medium Card (Venice) -->
            @if($venice)
            <div class="md:col-span-8 relative rounded-[24px] overflow-hidden group h-[400px] reveal cursor-pointer" style="transition-delay: 300ms;" onclick="window.location.href='{{ route('packages.show', $venice->slug) }}'">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $venice->image_url }}" alt="{{ $venice->title }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-60"></div>
                <div class="absolute bottom-0 left-0 right-0 p-stack-md glass-card border-t border-white/20 m-6 rounded-2xl flex justify-between items-end">
                    <div>
                        <h3 class="font-headline-md text-headline-md text-primary">{{ $venice->title }}</h3>
                        <p class="text-on-surface-variant font-body-md">Timeless romance on canals</p>
                    </div>
                    <button class="bg-primary text-on-primary px-6 py-2 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:scale-105 transition-transform">Explore</button>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Signature Experiences Section -->
    <section class="mb-stack-xl reveal">
        <div class="flex flex-col md:flex-row justify-between items-end mb-stack-lg">
            <div>
                <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Exclusive Curations</span>
                <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Signature Experiences</h2>
            </div>
            <p class="text-on-surface-variant font-body-md max-w-md md:text-right">
                Beyond traditional travel. We craft extraordinary moments tailored to your exact definition of adventure.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
            <!-- Exp 1 -->
            <div class="group relative rounded-[28px] overflow-hidden h-[360px] cursor-pointer">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($maldives){{ $maldives->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Yacht"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-secondary-fixed-dim bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md inline-block mb-3">Maritime</span>
                    <h3 class="font-headline-md text-xl text-white mb-2">Private Yacht Charter</h3>
                    <p class="text-white/75 text-sm line-clamp-2">Sail turquoise waters with a dedicated crew and customized itinerary.</p>
                </div>
            </div>
            <!-- Exp 2 -->
            <div class="group relative rounded-[28px] overflow-hidden h-[360px] cursor-pointer" style="transition-delay: 100ms;">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($alps){{ $alps->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Aviation"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-secondary-fixed-dim bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md inline-block mb-3">Aviation</span>
                    <h3 class="font-headline-md text-xl text-white mb-2">Helicopter Alpine Tour</h3>
                    <p class="text-white/75 text-sm line-clamp-2">Soar over dramatic peaks and land directly on glacier summits.</p>
                </div>
            </div>
            <!-- Exp 3 -->
            <div class="group relative rounded-[28px] overflow-hidden h-[360px] cursor-pointer" style="transition-delay: 200ms;">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($london){{ $london->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Gastronomy"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-secondary-fixed-dim bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md inline-block mb-3">Gastronomy</span>
                    <h3 class="font-headline-md text-xl text-white mb-2">Bespoke Dining</h3>
                    <p class="text-white/75 text-sm line-clamp-2">Private dinners by Michelin-starred chefs in remote settings.</p>
                </div>
            </div>
            <!-- Exp 4 -->
            <div class="group relative rounded-[28px] overflow-hidden h-[360px] cursor-pointer" style="transition-delay: 300ms;">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($venice){{ $venice->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Wellness"/>
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="text-[10px] uppercase tracking-widest font-bold text-secondary-fixed-dim bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md inline-block mb-3">Wellness</span>
                    <h3 class="font-headline-md text-xl text-white mb-2">Sanctuary Retreats</h3>
                    <p class="text-white/75 text-sm line-clamp-2">Rebalance your body and mind in isolated luxury wellness estates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / Pillars Section -->
    <section class="mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">The INXDVI Difference</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Why Travel With Us</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <!-- Pillar 1 -->
            <div class="bg-surface-container-low rounded-[32px] p-stack-md border border-outline-variant/20 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-start">
                <div class="w-12 h-12 rounded-2xl bg-secondary-fixed-dim/30 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-secondary text-2xl" data-icon="auto_awesome">auto_awesome</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-3">Tailored Just For You</h3>
                <p class="text-on-surface-variant font-body-md leading-relaxed">
                    No template itineraries. Every single detail of your journey is crafted around your unique desires, preferences, and pace.
                </p>
            </div>
            
            <!-- Pillar 2 -->
            <div class="bg-surface-container-low rounded-[32px] p-stack-md border border-outline-variant/20 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-start" style="transition-delay: 100ms;">
                <div class="w-12 h-12 rounded-2xl bg-secondary-fixed-dim/30 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-secondary text-2xl" data-icon="support_agent">support_agent</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-3">24/7 Dedicated Concierge</h3>
                <p class="text-on-surface-variant font-body-md leading-relaxed">
                    Enjoy seamless communication directly with our travel designers on WhatsApp, providing instant support and live adjustments.
                </p>
            </div>
            
            <!-- Pillar 3 -->
            <div class="bg-surface-container-low rounded-[32px] p-stack-md border border-outline-variant/20 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-start" style="transition-delay: 200ms;">
                <div class="w-12 h-12 rounded-2xl bg-secondary-fixed-dim/30 flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-secondary text-2xl" data-icon="vpn_key">vpn_key</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-primary mb-3">Exclusive VIP Access</h3>
                <p class="text-on-surface-variant font-body-md leading-relaxed">
                    Uncover private villas, local curators, and skip-the-line privileges that are unavailable to the general public.
                </p>
            </div>
        </div>
    </section>

    <!-- Moments of Wonder Gallery Section -->
    <section class="mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Visual Journeys</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Moments of Wonder</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter">
            <div class="rounded-[24px] overflow-hidden h-[240px] md:h-[300px] relative group">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($maldives){{ $maldives->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Maldives"/>
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>
            </div>
            <div class="rounded-[24px] overflow-hidden h-[240px] md:h-[300px] relative group mt-6 md:mt-12">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($alps){{ $alps->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Alps"/>
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>
            </div>
            <div class="rounded-[24px] overflow-hidden h-[240px] md:h-[300px] relative group">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($london){{ $london->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="London"/>
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>
            </div>
            <div class="rounded-[24px] overflow-hidden h-[240px] md:h-[300px] relative group mt-6 md:mt-12">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="@if($venice){{ $venice->image_url }}@else{{ asset('images/hero.png') }}@endif" alt="Venice"/>
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>
            </div>
        </div>
    </section>

    <!-- Testimonials Slider Section -->
    <section class="py-stack-xl bg-surface-container-low rounded-[48px] px-margin-mobile md:px-margin-desktop mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Our Travelers</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Shared Experiences</h2>
        </div>
        <div class="relative overflow-hidden" id="testimonial-slider">
            <div class="flex transition-transform duration-700 ease-in-out" id="slider-track">
                <!-- Testimonial 1 -->
                <div class="min-w-full px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <span class="material-symbols-outlined text-6xl text-secondary-fixed-dim mb-stack-sm" data-icon="format_quote" style="font-variation-settings: 'FILL' 1;">format_quote</span>
                        <blockquote class="font-display-lg text-headline-md text-on-surface italic mb-stack-md">
                            "The level of detail and personalization provided by Aetheris is unparalleled. Our journey through the Amalfi Coast was more than a trip; it was a series of perfectly orchestrated moments that felt both effortless and deeply profound."
                        </blockquote>
                        <div class="flex items-center justify-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-surface-variant overflow-hidden">
                                <img alt="Traveler" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgFIUiykm0JvOqD3GSrIDIbG1UX-cwQvRlostYU9SMO5HMg6DWWer5jyN1CgOFWpF4Z_27TjzcM0BQvcz3_WKpZU69z0_18uPEl--6x59In8Ky6AXc8OzqKkWi05ddLt6CDaL2hpO9ZUuPNdqn6IFga7fqN1EU9VBbJZ_TWB8dGsFqeg8LuFEqNpUy4dEwJcoHoxe6M3ojORUi2XudQ8qi-QXO6wJ2REktNwNOHVU4F-VU11Mw0p8sxYzPd3Xb-CGRfm-vNzLAcQ_P"/>
                            </div>
                            <div class="text-left">
                                <p class="font-bold text-primary">Julian Montgomery</p>
                                <p class="text-sm text-on-surface-variant uppercase tracking-widest">Venture Capitalist</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="min-w-full px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <span class="material-symbols-outlined text-6xl text-secondary-fixed-dim mb-stack-sm" data-icon="format_quote" style="font-variation-settings: 'FILL' 1;">format_quote</span>
                        <blockquote class="font-display-lg text-headline-md text-on-surface italic mb-stack-md">
                            "Aetheris transformed our perception of luxury. Their concierge didn't just book hotels; they curated access to private galleries and estate dinners that we simply couldn't have found elsewhere. Truly extraordinary."
                        </blockquote>
                        <div class="flex items-center justify-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-surface-variant overflow-hidden">
                                <img alt="Traveler" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsST8SOd5s5-NUP7mjEnPUuUjqi0bJsB1FiOV-KzQl534eTn1bfN8hXkIAme3tcIDagQVuzLmJIXbqngpuYKfrhaf0TQtFkyThta83n-N_Im04tlSetFh3D0LaeQefDDTZlDVj0gARE9S-so6H0vShf_6wYhoBV50hCSpyCxU0TTQ2mrTslpMggS5Vo38GsOKDK84iYgZn-Dl3Hr-fmQK5kUOR6wef9_u-KxaMcBPjWZJMPwVQOlisdIS_ghWQVFx3FioT6tbO_fhj"/>
                            </div>
                            <div class="text-left">
                                <p class="font-bold text-primary">Sophia Chen</p>
                                <p class="text-sm text-on-surface-variant uppercase tracking-widest">Architectural Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slider Controls -->
            <div class="flex justify-center space-x-4 mt-stack-lg">
                <button class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary hover:text-on-primary hover:border-primary transition-all" onclick="prevSlide()">
                    <span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
                </button>
                <button class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-primary hover:text-on-primary hover:border-primary transition-all" onclick="nextSlide()">
                    <span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Our Curators Section -->
    <section class="mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Our Artisans</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Meet Your Curators</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <!-- Curator 1 -->
            <div class="bg-surface-container-low rounded-[32px] p-6 border border-outline-variant/20 hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center">
                <div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-secondary shadow-md">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgFIUiykm0JvOqD3GSrIDIbG1UX-cwQvRlostYU9SMO5HMg6DWWer5jyN1CgOFWpF4Z_27TjzcM0BQvcz3_WKpZU69z0_18uPEl--6x59In8Ky6AXc8OzqKkWi05ddLt6CDaL2hpO9ZUuPNdqn6IFga7fqN1EU9VBbJZ_TWB8dGsFqeg8LuFEqNpUy4dEwJcoHoxe6M3ojORUi2XudQ8qi-QXO6wJ2REktNwNOHVU4F-VU11Mw0p8sxYzPd3Xb-CGRfm-vNzLAcQ_P" alt="Eleanor"/>
                </div>
                <h3 class="font-headline-md text-lg text-primary mb-1">Eleanor Vance</h3>
                <span class="text-[10px] uppercase tracking-widest font-bold text-secondary mb-3">European Heritage Expert</span>
                <p class="text-on-surface-variant text-sm mb-6">10+ years designing private castle tours and alpine retreats in Switzerland & Italy.</p>
                <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="bg-primary text-white hover:bg-secondary px-6 py-2.5 rounded-full text-xs uppercase tracking-widest font-bold transition-colors duration-200">Chat with Eleanor</a>
            </div>
            <!-- Curator 2 -->
            <div class="bg-surface-container-low rounded-[32px] p-6 border border-outline-variant/20 hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center" style="transition-delay: 100ms;">
                <div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-secondary shadow-md">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsST8SOd5s5-NUP7mjEnPUuUjqi0bJsB1FiOV-KzQl534eTn1bfN8hXkIAme3tcIDagQVuzLmJIXbqngpuYKfrhaf0TQtFkyThta83n-N_Im04tlSetFh3D0LaeQefDDTZlDVj0gARE9S-so6H0vShf_6wYhoBV50hCSpyCxU0TTQ2mrTslpMggS5Vo38GsOKDK84iYgZn-Dl3Hr-fmQK5kUOR6wef9_u-KxaMcBPjWZJMPwVQOlisdIS_ghWQVFx3FioT6tbO_fhj" alt="Marcus"/>
                </div>
                <h3 class="font-headline-md text-lg text-primary mb-1">Marcus Sterling</h3>
                <span class="text-[10px] uppercase tracking-widest font-bold text-secondary mb-3">Tropical & Marine Curator</span>
                <p class="text-on-surface-variant text-sm mb-6">Expert in arranging yacht charters and overwater villa stays in the Maldives & Fiji.</p>
                <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="bg-primary text-white hover:bg-secondary px-6 py-2.5 rounded-full text-xs uppercase tracking-widest font-bold transition-colors duration-200">Chat with Marcus</a>
            </div>
            <!-- Curator 3 -->
            <div class="bg-surface-container-low rounded-[32px] p-6 border border-outline-variant/20 hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center" style="transition-delay: 200ms;">
                <div class="w-24 h-24 rounded-full overflow-hidden mb-4 border-2 border-secondary shadow-md">
                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgFIUiykm0JvOqD3GSrIDIbG1UX-cwQvRlostYU9SMO5HMg6DWWer5jyN1CgOFWpF4Z_27TjzcM0BQvcz3_WKpZU69z0_18uPEl--6x59In8Ky6AXc8OzqKkWi05ddLt6CDaL2hpO9ZUuPNdqn6IFga7fqN1EU9VBbJZ_TWB8dGsFqeg8LuFEqNpUy4dEwJcoHoxe6M3ojORUi2XudQ8qi-QXO6wJ2REktNwNOHVU4F-VU11Mw0p8sxYzPd3Xb-CGRfm-vNzLAcQ_P" alt="Sophia"/>
                </div>
                <h3 class="font-headline-md text-lg text-primary mb-1">Sophia Chen</h3>
                <span class="text-[10px] uppercase tracking-widest font-bold text-secondary mb-3">Adventure & Wellness Designer</span>
                <p class="text-on-surface-variant text-sm mb-6">Specializes in curated health retreats, safari expeditions, and remote eco-lodges.</p>
                <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="bg-primary text-white hover:bg-secondary px-6 py-2.5 rounded-full text-xs uppercase tracking-widest font-bold transition-colors duration-200">Chat with Sophia</a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Simple Process</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Your Journey in Four Steps</h2>
        </div>
        <div class="relative">
            <!-- Connecting line for desktop -->
            <div class="hidden md:block absolute top-1/2 left-12 right-12 h-[2px] bg-outline-variant/20 -translate-y-1/2 z-0"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter relative z-10">
                <!-- Step 1 -->
                <div class="bg-white/40 backdrop-blur-sm rounded-[24px] p-6 border border-white/50 text-center flex flex-col items-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold mb-4 shadow-md">1</div>
                    <h3 class="font-headline-md text-lg text-primary mb-2">Explore & Inspire</h3>
                    <p class="text-on-surface-variant text-sm">Browse our handpicked luxury destinations and find your dream escape.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white/40 backdrop-blur-sm rounded-[24px] p-6 border border-white/50 text-center flex flex-col items-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold mb-4 shadow-md">2</div>
                    <h3 class="font-headline-md text-lg text-primary mb-2">Chat with Curators</h3>
                    <p class="text-on-surface-variant text-sm">Click our WhatsApp button to connect directly with your dedicated planner.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white/40 backdrop-blur-sm rounded-[24px] p-6 border border-white/50 text-center flex flex-col items-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold mb-4 shadow-md">3</div>
                    <h3 class="font-headline-md text-lg text-primary mb-2">Refine Itinerary</h3>
                    <p class="text-on-surface-variant text-sm">Receive, adjust, and finalize your customized day-by-day travel plan.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="bg-white/40 backdrop-blur-sm rounded-[24px] p-6 border border-white/50 text-center flex flex-col items-center hover:shadow-lg transition-shadow duration-300">
                    <div class="w-10 h-10 rounded-full bg-secondary text-white flex items-center justify-center font-bold mb-4 shadow-md">4</div>
                    <h3 class="font-headline-md text-lg text-primary mb-2">Depart & Indulge</h3>
                    <p class="text-on-surface-variant text-sm">Pack your bags and travel with total peace of mind and 24/7 support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="mb-stack-xl reveal">
        <div class="text-center mb-stack-lg">
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.2em] block mb-2">Common Queries</span>
            <h2 class="font-display-lg text-headline-md md:text-display-lg text-primary tracking-tighter">Frequently Asked Questions</h2>
        </div>
        <div class="max-w-3xl mx-auto space-y-4">
            <details class="group bg-surface-container-low rounded-2xl border border-outline-variant/20 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300 hover:shadow-md">
                <summary class="flex items-center justify-between text-primary font-bold text-headline-md md:text-lg">
                    <span>How does the bespoke travel planning process work?</span>
                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180 text-secondary">expand_more</span>
                </summary>
                <p class="mt-4 text-on-surface-variant font-body-md leading-relaxed">
                    We start with an exploratory conversation on WhatsApp to understand your interests, budget, and travel dates. Then, our curators draft a bespoke itinerary. We refine it together until it matches your exact definition of a dream trip before finalizing bookings.
                </p>
            </details>
            <details class="group bg-surface-container-low rounded-2xl border border-outline-variant/20 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300 hover:shadow-md">
                <summary class="flex items-center justify-between text-primary font-bold text-headline-md md:text-lg">
                    <span>Can you accommodate last-minute changes or emergencies?</span>
                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180 text-secondary">expand_more</span>
                </summary>
                <p class="mt-4 text-on-surface-variant font-body-md leading-relaxed">
                    Absolutely. Our 24/7 dedicated concierge is always available on WhatsApp to accommodate real-time travel adjustments, handle unexpected cancellations, or arrange alternative premium transportation.
                </p>
            </details>
            <details class="group bg-surface-container-low rounded-2xl border border-outline-variant/20 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300 hover:shadow-md">
                <summary class="flex items-center justify-between text-primary font-bold text-headline-md md:text-lg">
                    <span>What safety protocols do you maintain?</span>
                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180 text-secondary">expand_more</span>
                </summary>
                <p class="mt-4 text-on-surface-variant font-body-md leading-relaxed">
                    We exclusively partner with verified luxury operators, high-end private transport systems, and reputable resort networks. We monitor global travel advice and stay connected with you via WhatsApp throughout the entire duration of your trip.
                </p>
            </details>
            <details class="group bg-surface-container-low rounded-2xl border border-outline-variant/20 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer transition-all duration-300 hover:shadow-md">
                <summary class="flex items-center justify-between text-primary font-bold text-headline-md md:text-lg">
                    <span>Is travel insurance included in your curations?</span>
                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180 text-secondary">expand_more</span>
                </summary>
                <p class="mt-4 text-on-surface-variant font-body-md leading-relaxed">
                    While we do not sell insurance directly, our concierge team can recommend premium global travel insurance plans and assist you in selecting the coverage that best fits your custom package.
                </p>
            </details>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="relative rounded-[48px] overflow-hidden h-[500px] flex items-center justify-center text-center reveal">
        <img class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEGUVBPo33mwHFHdZOOosooi8FG83FdPP8fHIgBdrzCfVDDbelLOpeV89EOEWYKfYOzmfpWpFe_0B_0DMXz62UDVcpLkIrZIPtn67Nyfxp3tTPxZSJq3E5pwA7K60HOQkBl0mVPZeIjNJGmOoFMmuk7OqD9CYrQ2ngYhpvOURKViAgRBvfjVs6KO5tBfkWmAWgb1VVmlifVICpw7VTPk9oRYDcVyGv4ITVEM2eHDwk5ad-6Y1VBEiLgAG4vny0gloeE5gpEGiFUF74" alt="Mountains"/>
        <div class="absolute inset-0 bg-primary/40 backdrop-blur-[2px]"></div>
        <div class="relative z-10 px-margin-mobile">
            <h2 class="font-display-lg text-[32px] md:text-display-lg text-white mb-stack-md tracking-tighter">Your Journey Awaits</h2>
            <p class="text-white/80 max-w-xl mx-auto mb-stack-lg text-body-lg">Begin your story with Aetheris. Let our curators design an itinerary that reflects your unique spirit of adventure.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('explore') }}" class="bg-secondary text-on-secondary px-10 py-4 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:scale-110 transition-transform duration-300">Start Planning</a>
                <a href="{{ route('explore') }}" class="text-white border border-white/40 px-10 py-4 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:bg-white hover:text-primary transition-all duration-300 backdrop-blur-md">View Brochures</a>
            </div>
        </div>
    </section>

    <!-- Press & Partners Section -->
    <section class="py-12 border-t border-outline-variant/10 mb-stack-xl reveal">
        <div class="text-center mb-6">
            <span class="text-[10px] uppercase tracking-[0.25em] font-bold text-on-surface-variant opacity-60">Featured & Partnered With</span>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-40 grayscale hover:opacity-75 transition-opacity duration-300">
            <span class="font-display-lg text-lg md:text-2xl font-bold tracking-widest text-primary">CONDE NAST</span>
            <span class="font-display-lg text-lg md:text-2xl font-bold tracking-widest text-primary">FORBES TRAVEL</span>
            <span class="font-display-lg text-lg md:text-2xl font-bold tracking-widest text-primary">ROBB REPORT</span>
            <span class="font-display-lg text-lg md:text-2xl font-bold tracking-widest text-primary">TRAVEL + LEISURE</span>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    // Slider Logic
    let currentSlide = 0;
    const track = document.getElementById('slider-track');
    const slides = track.children.length;

    function updateSlider() {
        track.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides;
        updateSlider();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides) % slides;
        updateSlider();
    }

    // Auto-advance testimonials
    setInterval(nextSlide, 8000);

    // Header Background Movement Interaction
    document.addEventListener('mousemove', (e) => {
        const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
        const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
        document.querySelectorAll('.animate-float').forEach(el => {
            el.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    });

    // WebGL Shader Animation
    (function() {
        const canvas = document.getElementById('shader-canvas-ANIMATION_4');
        if (!canvas) return;

        function syncSize() {
            const w = canvas.clientWidth  || 1280;
            const h = canvas.clientHeight || 720;
            if (canvas.width !== w || canvas.height !== h) {
                canvas.width  = w;
                canvas.height = h;
            }
        }
        if (typeof ResizeObserver !== 'undefined') {
            new ResizeObserver(syncSize).observe(canvas);
        }
        syncSize();

        const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
        if (!gl) return;
        const vs = `attribute vec2 a_position;
        varying vec2 v_texCoord;
        void main() {
            v_texCoord = a_position * 0.5 + 0.5;
            gl_Position = vec4(a_position, 0.0, 1.0);
        }`;
        const fs = `precision highp float;
        varying vec2 v_texCoord;
        uniform float u_time;
        uniform vec2 u_resolution;

        void main() {
            vec2 uv = v_texCoord;
            float time = u_time * 0.5;
            
            float wave = sin(uv.x * 3.0 + time) * 0.5 + 0.5;
            wave += sin(uv.y * 4.0 - time * 0.8) * 0.3;
            wave += sin((uv.x + uv.y) * 2.0 + time * 1.2) * 0.2;
            
            vec3 colorA = vec3(0.0, 0.12, 0.25); // Deep Sea Blue
            vec3 colorB = vec3(0.0, 0.5, 0.5);   // Tropical Teal
            
            vec3 finalColor = mix(colorA, colorB, wave);
            
            float orangeGlow = smoothstep(0.8, 1.0, wave);
            vec3 orange = vec3(1.0, 0.5, 0.2);
            finalColor = mix(finalColor, orange, orangeGlow * 0.2);
            
            gl_FragColor = vec4(finalColor, 1.0);
        }`;
        
        function cs(type, src) {
            const s = gl.createShader(type);
            gl.shaderSource(s, src);
            gl.compileShader(s);
            return s;
        }
        const prog = gl.createProgram();
        gl.attachShader(prog, cs(gl.VERTEX_SHADER, vs));
        gl.attachShader(prog, cs(gl.FRAGMENT_SHADER, fs));
        gl.linkProgram(prog);
        gl.useProgram(prog);
        const buf = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, buf);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1,-1, 1,-1, -1,1, 1,1]), gl.STATIC_DRAW);
        const pos = gl.getAttribLocation(prog, 'a_position');
        gl.enableVertexAttribArray(pos);
        gl.vertexAttribPointer(pos, 2, gl.FLOAT, false, 0, 0);
        const uTime = gl.getUniformLocation(prog, 'u_time');
        const uRes = gl.getUniformLocation(prog, 'u_resolution');
        const uMouse = gl.getUniformLocation(prog, 'u_mouse');

        let mouse = { x: canvas.width / 2, y: canvas.height / 2 };
        window.addEventListener('mousemove', (event) => {
            const rect = canvas.getBoundingClientRect();
            if (rect.width && rect.height) {
                const nx = (event.clientX - rect.left) / rect.width;
                const ny = 1.0 - (event.clientY - rect.top) / rect.height;
                mouse.x = nx * canvas.width;
                mouse.y = ny * canvas.height;
            }
        });

        function render(t) {
            if (typeof ResizeObserver === 'undefined') syncSize();
            gl.viewport(0, 0, canvas.width, canvas.height);
            if (uTime) gl.uniform1f(uTime, t * 0.001);
            if (uRes) gl.uniform2f(uRes, canvas.width, canvas.height);
            if (uMouse) gl.uniform2f(uMouse, mouse.x, mouse.y);
            gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            requestAnimationFrame(render);
        }
        render(0);
    })();
</script>
@endsection
