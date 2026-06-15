@extends('layouts.layout')

@section('title', 'Aetheris | Curated Destinations')

@section('content')
<main class="pt-32 pb-stack-xl max-w-container-max mx-auto px-6 md:px-margin-desktop">
    <!-- Header Section -->
    <header class="mb-stack-lg">
        <h1 class="font-display-lg text-display-lg text-on-background mb-4">Curated Experiences</h1>
        <p class="text-on-surface-variant max-w-2xl font-body-lg text-body-lg">Discover the world's most exclusive destinations through our bespoke itineraries, designed for the discerning global traveler.</p>
    </header>
    
    <div class="flex flex-col md:flex-row gap-gutter">
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-72 flex-shrink-0">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-outline-variant/30 sticky top-32">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-headline-md text-headline-md">Filters</h3>
                    <span class="material-symbols-outlined text-on-surface-variant">tune</span>
                </div>
                
                <!-- Category Filter -->
                <div class="mb-stack-md">
                    <label class="font-label-sm text-label-sm uppercase tracking-widest block mb-4">Category</label>
                    <div class="space-y-3">
                        <label class="flex items-center group cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary-container" 
                                   {{ !request('category') || request('category') == 'all' ? 'checked' : '' }}
                                   onclick="window.location.href='{{ route('explore', ['category' => 'all', 'search' => request('search')]) }}'"/>
                            <span class="ml-3 text-on-surface-variant group-hover:text-primary transition-colors font-medium">All Escapes</span>
                        </label>
                        @foreach(['Luxury', 'Adventure', 'Urban', 'Romantic'] as $cat)
                        <label class="flex items-center group cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 rounded border-outline-variant text-secondary focus:ring-secondary-container"
                                   {{ request('category') == $cat ? 'checked' : '' }}
                                   onclick="window.location.href='{{ route('explore', ['category' => $cat, 'search' => request('search')]) }}'"/>
                            <span class="ml-3 text-on-surface-variant group-hover:text-primary transition-colors font-medium">{{ $cat }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Duration Filter (Aesthetic/Static for Demo) -->
                <div class="mb-stack-md pt-6 border-t border-outline-variant/20">
                    <label class="font-label-sm text-label-sm uppercase tracking-widest block mb-4">Duration</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button class="px-3 py-2 rounded-xl bg-surface-container-low border border-outline-variant/20 text-on-surface text-sm hover:border-secondary transition-colors">1-3 Days</button>
                        <button class="px-3 py-2 rounded-xl bg-secondary-container text-on-secondary-container font-semibold text-sm">4-7 Days</button>
                        <button class="px-3 py-2 rounded-xl bg-surface-container-low border border-outline-variant/20 text-on-surface text-sm hover:border-secondary transition-colors">8-14 Days</button>
                        <button class="px-3 py-2 rounded-xl bg-surface-container-low border border-outline-variant/20 text-on-surface text-sm hover:border-secondary transition-colors">2+ Weeks</button>
                    </div>
                </div>
                
                <!-- Price Range (Aesthetic/Static for Demo) -->
                <div class="mb-6 pt-6 border-t border-outline-variant/20">
                    <label class="font-label-sm text-label-sm uppercase tracking-widest block mb-4">Price Range (USD)</label>
                    <input class="w-full h-1 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-secondary" max="50000" min="1000" step="500" type="range" value="25000"/>
                    <div class="flex justify-between mt-2 text-on-surface-variant text-sm font-label-sm">
                        <span>$1,000</span>
                        <span>$50,000+</span>
                    </div>
                </div>
                
                <a href="{{ route('explore', ['category' => 'all']) }}" class="w-full block text-center bg-primary text-white py-4 rounded-2xl font-label-sm text-label-sm uppercase tracking-widest hover:shadow-lg transition-all active:scale-95">Reset Filters</a>
            </div>
        </aside>
        
        <!-- Main Content Grid -->
        <div class="flex-grow">
            <!-- Search & Sort Row -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-stack-md gap-4">
                <form action="{{ route('explore') }}" method="GET" class="relative w-full sm:w-96">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}"/>
                    @endif
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input name="search" value="{{ request('search') }}" class="w-full pl-12 pr-4 py-3 bg-white border-none rounded-2xl shadow-sm focus:ring-2 focus:ring-secondary/20 placeholder:text-outline" placeholder="Search destinations..." type="text"/>
                </form>
                <div class="flex items-center gap-4 text-on-surface-variant">
                    <span class="text-sm">Sort by:</span>
                    <select class="bg-transparent border-none text-primary font-semibold focus:ring-0 cursor-pointer">
                        <option>Curated Choice</option>
                        <option>Price: High to Low</option>
                        <option>Price: Low to High</option>
                        <option>Newest First</option>
                    </select>
                </div>
            </div>
            
            <!-- Bento Grid for Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
                @forelse($packages as $package)
                <!-- Card -->
                <div class="group relative bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col justify-between">
                    <div>
                        <div class="h-80 relative overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ $package->image_url }}" alt="{{ $package->title }}"/>
                            <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-md px-4 py-2 rounded-full font-label-sm text-label-sm text-primary">
                                {{ $package->category }}
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="font-headline-md text-headline-md text-on-background mb-1">{{ $package->title }}</h3>
                                    <div class="flex items-center text-on-surface-variant space-x-2 mt-2">
                                        <span class="material-symbols-outlined text-[18px]">schedule</span>
                                        <span class="text-sm">{{ $package->duration }} • {{ $package->location }}</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs uppercase tracking-widest text-outline block">From</span>
                                    <span class="text-xl font-bold text-secondary">${{{ number_format($package->price) }}}</span>
                                </div>
                            </div>
                            <p class="text-on-surface-variant font-body-md line-clamp-2 mb-4">{{ $package->description }}</p>
                        </div>
                    </div>
                    
                    <div class="px-8 pb-8">
                        <div class="flex items-center justify-between pt-6 border-t border-outline-variant/20">
                            <div class="flex items-center space-x-2 text-sm text-on-surface-variant">
                                <span class="w-2.5 h-2.5 rounded-full {{ $package->inventory > 2 ? 'bg-green-500' : 'bg-orange-500' }}"></span>
                                <span>{{ $package->inventory }} slots remaining</span>
                            </div>
                            <a href="{{ route('packages.show', $package->slug) }}" class="flex items-center space-x-2 text-primary font-bold group/btn">
                                <span>View Details</span>
                                <span class="material-symbols-outlined group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-20 bg-white rounded-3xl border border-outline-variant/20">
                    <span class="material-symbols-outlined text-6xl text-outline mb-4">travel_explore</span>
                    <h3 class="text-headline-md font-semibold text-primary">No destinations found</h3>
                    <p class="text-on-surface-variant mt-2">Try adjusting your filters or search terms.</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination (Aesthetic) -->
            @if($packages->count() > 0)
            <div class="mt-stack-lg flex items-center justify-center space-x-4">
                <button class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center text-on-surface hover:bg-white hover:shadow-md transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <div class="flex items-center space-x-2">
                    <button class="w-12 h-12 rounded-full bg-primary text-white font-bold">1</button>
                    <button class="w-12 h-12 rounded-full text-on-surface-variant hover:bg-surface-container-high transition-colors font-bold">2</button>
                </div>
                <button class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center text-on-surface hover:bg-white hover:shadow-md transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
