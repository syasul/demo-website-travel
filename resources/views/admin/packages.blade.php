@extends('layouts.admin')

@section('title', 'Aetheris | Manage Inventory')
@section('page_title', 'Travel Catalog Inventory')
@section('page_subtitle', 'Manage Aetheris destinations, pricing, and available reservation slots.')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-outline-variant/30 overflow-hidden">
    <div class="px-6 py-5 border-b border-outline-variant/20 bg-surface-container-lowest/50 flex justify-between items-center">
        <h3 class="font-headline-md text-headline-md text-primary">All Active Packages</h3>
        <span class="text-sm font-semibold text-on-surface-variant bg-surface-container-high px-3 py-1 rounded-full">{{ $packages->count() }} destinations total</span>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low text-on-surface-variant text-[11px] uppercase tracking-widest border-b border-outline-variant/30">
                    <th class="px-6 py-4 font-bold">Package</th>
                    <th class="px-6 py-4 font-bold">Category</th>
                    <th class="px-6 py-4 font-bold">Duration</th>
                    <th class="px-6 py-4 font-bold">Price (USD)</th>
                    <th class="px-6 py-4 font-bold">Slots Left (Inventory)</th>
                    <th class="px-6 py-4 font-bold text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant/30">
                @foreach($packages as $package)
                <tr class="hover:bg-surface-container-lowest/55 transition-colors">
                    <!-- Thumbnail & Title -->
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl overflow-hidden flex-shrink-0">
                                <img class="w-full h-full object-cover" src="{{ $package->image_url }}" alt="{{ $package->title }}"/>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary">{{ $package->title }}</h4>
                                <span class="text-xs text-on-surface-variant font-mono">{{ $package->location }}</span>
                            </div>
                        </div>
                    </td>
                    
                    <!-- Category badge -->
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-bold rounded-full uppercase bg-secondary-container text-on-secondary-container">
                            {{ $package->category }}
                        </span>
                    </td>
                    
                    <!-- Duration -->
                    <td class="px-6 py-4 font-medium text-primary">
                        {{ $package->duration }}
                    </td>
                    
                    <!-- Price -->
                    <td class="px-6 py-4 font-bold text-primary">
                        ${{ number_format($package->price) }}
                    </td>
                    
                    <!-- Current slots inventory with status marker -->
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full {{ $package->inventory > 2 ? 'bg-green-500' : ($package->inventory > 0 ? 'bg-orange-500' : 'bg-red-500') }}"></span>
                            <span class="font-bold text-primary">{{ $package->inventory }} slots</span>
                        </div>
                    </td>
                    
                    <!-- Inline update form -->
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.packages.inventory', $package->id) }}" method="POST" class="flex items-center justify-center gap-2 max-w-[160px] mx-auto">
                            @csrf
                            <input name="inventory" type="number" min="0" max="100" class="w-20 bg-surface-container-low border-transparent rounded-lg py-1 px-2 text-center text-sm font-semibold focus:ring-2 focus:ring-secondary/20" value="{{ $package->inventory }}"/>
                            <button type="submit" class="bg-primary text-white p-2 rounded-lg hover:bg-secondary transition-colors" title="Save Inventory">
                                <span class="material-symbols-outlined text-sm">save</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
