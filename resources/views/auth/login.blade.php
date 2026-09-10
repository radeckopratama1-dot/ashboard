@extends('layouts.app')

@section('title', 'Masuk Akun - AshBoard')

@section('content')
<section class="min-h-[calc(100vh-5rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
        
        <!-- Left Side: Login Form -->
        <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-center">
            
            <div class="mb-8 space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                    Portal Pengguna AshBoard
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Selamat Datang Kembali</h2>
                <p class="text-sm text-slate-500">Masuk untuk mengakses pemantauan terapi & jadwal harian Anda.</p>
            </div>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="p-4 mb-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold space-y-1">
                    @foreach ($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.perform') }}" class="space-y-5">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">Alamat Email</label>
                    <div class="relative rounded-xl shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" required placeholder="nama@email.com" value="{{ old('email') }}"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm transition-all">
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">Kata Sandi</label>
                        <a href="#" class="text-xs font-semibold text-sky-600 hover:text-sky-700 hover:underline">
                            Lupa kata sandi?
                        </a>
                    </div>
                    <div class="relative rounded-xl shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" name="password" id="password" required placeholder="Masukkan kata sandi Anda"
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm transition-all">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center text-slate-600 font-medium">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-slate-300 rounded mr-2">
                        Ingat saya di perangkat ini
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 px-4 bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm rounded-xl shadow-md shadow-sky-600/30 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <span>Masuk ke AshBoard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-sky-600 hover:text-sky-700 hover:underline">
                        Daftar di sini
                    </a>
                </p>
            </div>

        </div>

        <!-- Right Side: Digital Health Illustration Banner -->
        <div class="hidden lg:flex lg:col-span-6 bg-slate-900 p-12 flex-col justify-between relative overflow-hidden text-white">
            
            <!-- Top Header Illustration badge -->
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-2xl bg-sky-600 flex items-center justify-center text-white font-bold text-xl shadow-lg mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400">Pendamping Kesehatan Digital</span>
                <h3 class="text-2xl font-extrabold text-white mt-1 leading-snug">Transformasi Bebas Asap Rokok Berbasis Sains</h3>
            </div>

            <!-- Digital Health Card Graphic Illustration -->
            <div class="relative z-10 my-8 bg-slate-800 p-6 rounded-2xl border border-slate-700 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center font-bold">
                        💊
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Terapi Orodispersible Film</h4>
                        <p class="text-xs text-slate-300">Cytisine 1.5 mg Oral Larut</p>
                    </div>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed italic">
                    "Pemantauan teratur meningkatkan tingkat keberhasilan berhenti merokok hingga 3x lipat."
                </p>
                <div class="pt-2 border-t border-slate-700 flex items-center justify-between text-[11px] text-sky-300 font-semibold">
                    <span>Supervisi Medis Aktif</span>
                    <span>100% Bebas Asap</span>
                </div>
            </div>

            <!-- Bottom info -->
            <div class="relative z-10 text-xs text-slate-400 flex items-center justify-between">
                <span>AshBoard System v2.6</span>
                <span>Supported by Cytisine ODF</span>
            </div>

        </div>

    </div>
</section>
@endsection
