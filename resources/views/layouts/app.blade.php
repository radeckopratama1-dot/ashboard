<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'AshBoard - Langkah Nyata Berhenti Merokok')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AlpineJS for smooth dynamic micro-interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }
        .glass-header {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800 antialiased selection:bg-sky-500 selection:text-white">

    <!-- Navigation Header -->
    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 glass-header border-b border-slate-200/90 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand Name -->
                <a href="{{ route('welcome') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-sky-600 flex items-center justify-center text-white shadow-md shadow-sky-600/20 group-hover:scale-105 transition-transform duration-300">
                        <!-- Shield with Leaf/Film Icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-2xl font-extrabold tracking-tight text-slate-900">Ash<span class="text-sky-600">Board</span></span>
                        <span class="block text-[10px] font-semibold tracking-wider text-slate-500 uppercase -mt-1">Digital Cessation & Terapi Cytisine</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-8 font-medium text-sm text-slate-600">
                    <a href="{{ route('welcome') }}" class="hover:text-sky-600 transition-colors {{ request()->routeIs('welcome') ? 'text-sky-600 font-bold' : '' }}">Beranda</a>
                    <a href="{{ route('welcome') }}#pilar-fitur" class="hover:text-sky-600 transition-colors">4 Pilar Fitur</a>
                    <a href="{{ route('welcome') }}#terapi-cytisine" class="hover:text-sky-600 transition-colors">Terapi Film Cytisine</a>
                    
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="text-sky-600 font-bold flex items-center gap-1.5 px-3 py-1 bg-sky-50 rounded-lg border border-sky-200">
                                <span class="w-2 h-2 rounded-full bg-sky-600 animate-pulse"></span>
                                Portal Admin
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="text-sky-600 font-bold flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                Dashboard Saya
                            </a>
                        @endif
                    @endauth
                </nav>

                <!-- Auth Navigation Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <span class="text-xs font-bold text-slate-700 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200">
                            {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-semibold text-slate-700 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all duration-200 cursor-pointer">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-bold text-sky-700 hover:text-sky-800 hover:bg-sky-50 rounded-xl transition-all duration-200">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-bold text-white bg-sky-600 hover:bg-sky-700 rounded-xl shadow-md shadow-sky-600/30 hover:shadow-lg transition-all duration-200 inline-block">
                            Mulai Program
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="md:hidden border-b border-slate-200 bg-white px-4 pt-2 pb-6 space-y-3">
            <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">Beranda</a>
            <a href="{{ route('welcome') }}#pilar-fitur" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">4 Pilar Fitur</a>
            <a href="{{ route('welcome') }}#terapi-cytisine" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">Terapi Film Cytisine</a>
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="w-full text-center px-4 py-2.5 text-sm font-bold text-sky-700 bg-sky-50 rounded-xl">Dashboard Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-center px-4 py-2.5 text-sm font-bold text-rose-600 bg-rose-50 rounded-xl">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center px-4 py-2.5 text-sm font-bold text-sky-700 bg-sky-50 rounded-xl">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center px-4 py-2.5 text-sm font-bold text-white bg-sky-600 hover:bg-sky-700 rounded-xl">Mulai Program</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Static Footer Section -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Brand Info -->
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-sky-600 flex items-center justify-center text-white font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-white">Ash<span class="text-sky-400">Board</span></span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-md leading-relaxed">
                        Platform pendamping digital terintegrasi untuk program berhenti merokok dengan inovasi terapi Orodispersible Film (film oral larut berbasis cytisine). Dirancang secara medis, profesional, dan menenangkan untuk mendukung kesehatan bebas asap rokok.
                    </p>
                </div>

                <!-- Fast Links -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Navigasi Utama</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('welcome') }}" class="hover:text-sky-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-sky-400 transition-colors">Masuk Akun</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-sky-400 transition-colors">Pendaftaran Baru</a></li>
                        <li><a href="{{ route('dashboard') }}" class="hover:text-sky-400 transition-colors">Dashboard Pemantauan</a></li>
                    </ul>
                </div>

                <!-- Program Info -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Layanan & Terapi</h3>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span> Skrining Nikotin FTND
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span> Terapi Oral Film Cytisine
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span> Supervisi Tenaga Kesehatan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Komunitas Bebas Asap
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Mandatory Copyright Footer Bar -->
            <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p class="font-medium text-slate-400">
                    Copyright © 2026 by Radecko & Haura
                </p>
                <div class="flex items-center space-x-6 text-slate-500">
                    <span class="hover:text-slate-400 transition-colors cursor-pointer">Kebijakan Privasi</span>
                    <span class="hover:text-slate-400 transition-colors cursor-pointer">Syarat & Ketentuan</span>
                    <span class="hover:text-slate-400 transition-colors cursor-pointer">Kontak Medis</span>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
