<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Aetheris | Admin Portal')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #c4c6cf;
            border-radius: 10px;
        }
    </style>
    
    <!-- Custom Tailwind Configuration from Stitch Design -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-background": "#191c1e",
                        "error-container": "#ffdad6",
                        "on-tertiary-container": "#d16921",
                        "outline": "#74777f",
                        "surface-dim": "#d8dadc",
                        "on-secondary-fixed-variant": "#004f4f",
                        "error": "#ba1a1a",
                        "surface": "#f7f9fb",
                        "on-secondary-container": "#006e6e",
                        "surface-container-lowest": "#ffffff",
                        "primary-container": "#001f3f",
                        "tertiary-fixed-dim": "#ffb68d",
                        "on-error": "#ffffff",
                        "tertiary": "#0e0300",
                        "secondary-container": "#90efef",
                        "inverse-surface": "#2d3133",
                        "on-surface-variant": "#43474e",
                        "on-tertiary-fixed-variant": "#763300",
                        "on-error-container": "#93000a",
                        "on-primary-fixed-variant": "#2f486a",
                        "on-primary-fixed": "#001c3a",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#371400",
                        "surface-container-low": "#f2f4f6",
                        "inverse-primary": "#afc8f0",
                        "surface-container": "#eceef0",
                        "on-primary": "#ffffff",
                        "primary-fixed": "#d4e3ff",
                        "tertiary-fixed": "#ffdbc9",
                        "surface-tint": "#476083",
                        "on-primary-container": "#6f88ad",
                        "surface-bright": "#f7f9fb",
                        "on-tertiary-fixed": "#331200",
                        "secondary": "#006a6a",
                        "on-secondary": "#ffffff",
                        "surface-container-high": "#e6e8ea",
                        "primary-fixed-dim": "#afc8f0",
                        "secondary-fixed-dim": "#76d6d5",
                        "outline-variant": "#c4c6cf",
                        "inverse-on-surface": "#eff1f3",
                        "on-secondary-fixed": "#002020",
                        "surface-container-highest": "#e0e3e5",
                        "primary": "#000613",
                        "on-surface": "#191c1e",
                        "secondary-fixed": "#93f2f2",
                        "background": "#f7f9fb"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-sm": "12px",
                        "margin-desktop": "64px",
                        "stack-xl": "80px",
                        "gutter": "24px",
                        "stack-md": "24px",
                        "base": "8px",
                        "margin-mobile": "20px",
                        "container-max": "1280px",
                        "stack-lg": "48px"
                    },
                    "fontFamily": {
                        "label-sm": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "display-lg": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "body-lg": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "label-sm": ["13px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-surface font-body-md text-on-surface min-h-screen flex">

    <!-- Admin Side Navigation Bar -->
    <aside class="h-screen w-64 fixed left-0 top-0 bg-surface-container-low flex flex-col p-4 space-y-4 border-r border-outline-variant z-50">
        <div class="flex items-center gap-3 mb-stack-lg px-2">
            <div class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl">
                <span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">diamond</span>
            </div>
            <div>
                <h2 class="font-headline-md text-headline-md text-primary tracking-tight">Admin Portal</h2>
                <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">Luxury Management</p>
            </div>
        </div>
        
        <nav class="flex-1 space-y-1 sidebar-scroll overflow-y-auto">
            <!-- Dashboard link -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-variant' }}" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.dashboard') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
                <span class="font-body-md">Dashboard</span>
            </a>
            
            <!-- Bookings tracker link -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.bookings') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-variant' }}" href="{{ route('admin.bookings') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.bookings') ? "font-variation-settings: 'FILL' 1;" : '' }}">calendar_month</span>
                <span class="font-body-md">Bookings</span>
            </a>
            
            <!-- Inventory packages link -->
            <a class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.packages') ? 'bg-secondary-container text-on-secondary-container font-bold' : 'text-on-surface-variant hover:bg-surface-variant' }}" href="{{ route('admin.packages') }}">
                <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.packages') ? "font-variation-settings: 'FILL' 1;" : '' }}">travel_explore</span>
                <span class="font-body-md">Inventory</span>
            </a>
        </nav>
        
        <div class="pt-4 border-t border-outline-variant space-y-1">
            <a href="{{ route('home') }}" class="w-full mb-4 py-3 px-4 bg-primary text-white rounded-xl font-bold flex items-center justify-center gap-2 hover:shadow-lg transition-all active:scale-95 text-center">
                <span class="material-symbols-outlined text-sm">home</span>
                Storefront
            </a>
            <span class="text-xs text-on-surface-variant block text-center opacity-60">System Version 12.0</span>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-64 flex-1 p-margin-desktop bg-surface overflow-x-hidden">
        <!-- Common Top Bar -->
        <header class="flex justify-between items-center mb-stack-xl">
            <div>
                <h1 class="font-display-lg text-display-lg text-primary mb-1">@yield('page_title', 'Portfolio Insights')</h1>
                <p class="text-on-surface-variant font-body-lg">@yield('page_subtitle', 'Welcome back, Administrator.')</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-secondary-fixed shadow-sm">
                    <img alt="Admin User Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdW7v7U9lTjIvpPHRLZj96U22gt3HLEw26tjmGD7Tnef0xUbsoRjfjVQOitGhokZ8gyF6S3jRX9gBlDtRFJEf_hOoQxoGz4dnQRIJrtJa3oOlb7MqBasad4tsuZ0-scTwLLFlx3dXUfN1VXPea3-1EbQdK_-A3KClLJTA2fEQjGKObA9BfPxGq2A7bmXvo8dFGiz4U49vFV_1uNIcCkwtupCPMpchd61u8VsBII-RArZrHhrUasfLHbscVcVRsMCDsoXJB3Y0gKaFS"/>
                </div>
            </div>
        </header>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-800 rounded-xl border border-green-200 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-500">check_circle</span>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->has('error'))
        <div class="mb-6 p-4 bg-red-50 text-red-800 rounded-xl border border-red-200 flex items-center gap-2">
            <span class="material-symbols-outlined text-red-500">error</span>
            <span class="text-sm font-semibold">{{ $errors->first('error') }}</span>
        </div>
        @endif
        
        @yield('content')
    </main>

    <script>
        // Micro-interactions
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-4px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
