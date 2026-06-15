<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Aetheris | Curated Luxury Travel')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&amp;family=Plus+Jakarta+Sans:wght@400;600;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@100..900&amp;family=Plus+Jakarta+Sans:wght@100..900&amp;display=swap" rel="stylesheet"/>
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #d4e3ff;
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
                        "display-lg-mobile": ["Manrope"],
                        "display-lg": ["Manrope"],
                        "headline-md": ["Manrope"],
                        "body-lg": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "label-sm": ["13px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "display-lg-mobile": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-background text-on-background font-body-md selection:bg-secondary-container selection:text-on-secondary-container">

    <!-- Storefront Navigation Shell -->
    <nav class="fixed top-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-sm transition-all duration-300" id="main-nav">
        <div class="flex justify-between items-center px-6 md:px-margin-desktop py-4 max-w-container-max mx-auto">
            <a href="{{ route('home') }}" class="font-display-lg text-display-lg text-primary font-bold tracking-tighter hover:opacity-85 transition-opacity flex items-center gap-2">
                Aetheris <span class="text-[10px] tracking-widest font-sans font-semibold bg-primary text-white px-2 py-0.5 rounded uppercase">by INXDVI</span>
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a class="font-label-sm text-label-sm uppercase tracking-widest {{ request()->routeIs('explore') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-all duration-300" href="{{ route('explore') }}">Destinations</a>
                <a class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant hover:text-primary transition-all duration-300" href="{{ route('explore') }}?category=Luxury">Experiences</a>
                <a class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant hover:text-primary transition-all duration-300" href="{{ route('explore') }}">Stays</a>
                <a class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant hover:text-primary transition-all duration-300" href="{{ route('explore') }}">Concierge</a>
            </div>
            <div class="flex items-center space-x-6">
                <!-- Redirect Sign In to Admin Panel for ease of navigation -->
                <a href="{{ route('admin.dashboard') }}" class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant hover:text-primary transition-transform duration-200 hover:scale-105">Sign In</a>
                <a href="{{ route('explore') }}" class="bg-primary text-on-primary px-6 py-3 rounded-full font-label-sm text-label-sm uppercase tracking-widest hover:scale-105 transition-transform duration-200">Book Now</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Storefront Footer Shell -->
    <footer class="bg-on-background py-stack-lg text-surface">
        <div class="max-w-container-max mx-auto px-6 md:px-margin-desktop flex flex-col md:flex-row justify-between items-start md:items-center space-y-stack-lg md:space-y-0">
            <div class="flex flex-col space-y-4">
                <div class="font-display-lg text-display-lg text-surface font-bold tracking-tighter">Aetheris</div>
                <p class="text-surface-variant opacity-80 font-body-md max-w-xs">Elevating travel to an art form through curated experiences and impeccable service by INXDVI.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-stack-lg w-full md:w-auto">
                <div class="flex flex-col space-y-2">
                    <span class="font-label-sm text-surface-variant opacity-60 uppercase mb-2">Company</span>
                    <a class="text-surface-variant opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-colors" href="#">Privacy Policy</a>
                    <a class="text-surface-variant opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a>
                </div>
                <div class="flex flex-col space-y-2">
                    <span class="font-label-sm text-surface-variant opacity-60 uppercase mb-2">Explore</span>
                    <a class="text-surface-variant opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-colors" href="#">Sustainability</a>
                    <a class="text-surface-variant opacity-80 hover:opacity-100 hover:text-secondary-fixed transition-colors" href="#">Press</a>
                </div>
                <div class="flex flex-col space-y-4 col-span-2">
                    <span class="font-label-sm text-surface-variant opacity-60 uppercase">Contact Us</span>
                    <div class="flex flex-col space-y-2 text-surface-variant text-sm">
                        <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="flex items-center space-x-2 hover:text-secondary-fixed transition-colors">
                            <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">chat</span>
                            <span>WhatsApp: 0813-3001-2100</span>
                        </a>
                    </div>
                    <div class="flex space-x-4 mt-2">
                        <a class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-on-background transition-all" href="#">
                            <span class="material-symbols-outlined text-xl" data-icon="public">public</span>
                        </a>
                        <a class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-on-background transition-all" href="#">
                            <span class="material-symbols-outlined text-xl" data-icon="alternate_email">alternate_email</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-container-max mx-auto px-6 md:px-margin-desktop mt-stack-lg pt-8 border-t border-outline-variant/20 flex flex-col md:flex-row justify-between items-center opacity-60 text-sm">
            <span>© 2024 Aetheris Luxury Travel by INXDVI. All rights reserved.</span>
            <div class="flex space-x-8 mt-4 md:mt-0">
                <span>Designed for Modern Explorers</span>
                <span>ISO 9001 Certified Luxury</span>
            </div>
        </div>
    </footer>

    <!-- Global Scripts -->
    <script>
        // Scroll Reveal Logic
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // Header scroll transparency effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('main-nav');
            if (window.scrollY > 20) {
                nav.classList.add('shadow-md', 'bg-white/90');
                nav.classList.remove('bg-white/70');
            } else {
                nav.classList.remove('shadow-md', 'bg-white/90');
                nav.classList.add('bg-white/70');
            }
        });
    </script>
    @yield('scripts')
    
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281330012100" target="_blank" rel="noopener noreferrer" class="fixed bottom-8 right-8 z-50 flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-2xl hover:scale-110 hover:bg-[#20ba5a] transition-all duration-300 group" aria-label="Chat on WhatsApp">
        <span class="absolute right-full mr-3 py-1.5 px-3 bg-slate-900/90 backdrop-blur-sm text-white text-xs font-semibold rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-md">
            Chat with Us (INXDVI)
        </span>
        <!-- WhatsApp SVG Icon -->
        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.457L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.42 9.864-9.864.002-2.637-1.019-5.117-2.875-6.976C16.3 1.905 13.825.885 11.19.884c-5.441 0-9.865 4.42-9.869 9.866-.001 1.77.468 3.498 1.36 5.026l-.993 3.634 3.732-.98c1.568.854 3.292 1.302 4.933 1.302zm9.251-6.275c-.272-.137-1.614-.796-1.863-.887-.249-.09-.431-.136-.613.137-.182.273-.703.887-.862 1.069-.159.182-.318.205-.59.069-.272-.137-1.149-.424-2.19-1.355-.809-.721-1.355-1.612-1.513-1.886-.159-.273-.017-.42.119-.556.123-.122.272-.318.409-.477.137-.159.182-.273.272-.455.09-.182.046-.341-.023-.478-.069-.137-.613-1.477-.84-2.023-.22-.53-.442-.457-.613-.466-.159-.008-.341-.01-.523-.01-.182 0-.477.068-.727.341-.25.272-.954.932-.954 2.273 0 1.341.977 2.636 1.114 2.818.137.182 1.922 2.934 4.659 4.116.65.281 1.157.449 1.554.575.654.207 1.25.178 1.72.108.524-.078 1.614-.659 1.841-1.295.228-.636.228-1.182.159-1.295-.069-.114-.249-.182-.522-.319z"/>
        </svg>
        <!-- Pulse animation effect -->
        <span class="absolute inset-0 rounded-full bg-[#25D366] opacity-30 animate-ping z-[-1]"></span>
    </a>
</body>
</html>
