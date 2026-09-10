@extends('layouts.app')

@section('title', 'Pendaftaran Program - AshBoard')

@section('content')
<section class="min-h-[calc(100vh-5rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-12">
        
        <!-- Left Side: Benefits & Context Banner -->
        <div class="hidden lg:flex lg:col-span-5 bg-slate-900 p-10 flex-col justify-between relative overflow-hidden text-white">
            
            <div class="relative z-10 space-y-6">
                <div class="w-12 h-12 rounded-2xl bg-sky-600 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div>
                    <span class="text-xs uppercase font-bold tracking-widest text-sky-400">Program Berhenti Merokok</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1 leading-snug">Mulai Perjalanan Sehat Anda Hari Ini</h3>
                </div>

                <div class="space-y-4 pt-4">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-sky-600 text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">1</div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Skrining Awal Nikotin</h4>
                            <p class="text-xs text-slate-300">Asesmen ketergantungan klinis awal gratis.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-teal-600 text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">2</div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Terapi Oral Film Cytisine</h4>
                            <p class="text-xs text-slate-300">Formulasi film larut modern untuk meredakan craving.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-indigo-600 text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">3</div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Supervisi & Komunitas</h4>
                            <p class="text-xs text-slate-300">Pendampingan dokter/apoteker dan dukungan peer-support.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 pt-6 border-t border-slate-800 text-xs text-slate-400">
                Privasi dan data kesehatan Anda terlindungi dengan standar keamanan medis terenkripsi.
            </div>

        </div>

        <!-- Right Side: Registration Form -->
        <div class="lg:col-span-7 p-8 sm:p-10 flex flex-col justify-center">
            
            <div class="mb-6 space-y-1">
                <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-800 text-xs font-bold">Pendaftaran Akun Baru</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight pt-1">Gabung di AshBoard</h2>
                <p class="text-sm text-slate-500">Lengkapi formulir di bawah ini untuk memulai program.</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register.perform') }}" class="space-y-4">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Lengkap</label>
                    <div class="relative rounded-xl shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" name="name" id="name" required placeholder="Masukkan Nama Lengkap Anda" value="{{ old('name') }}"
                            class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Alamat Email</label>
                    <div class="relative rounded-xl shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" required placeholder="nama@email.com" value="{{ old('email') }}"
                            class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                    </div>
                </div>

                <!-- Password & Confirmation Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Password</label>
                        <div class="relative rounded-xl shadow-xs">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required placeholder="Minimal 8 karakter"
                                class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative rounded-xl shadow-xs">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password"
                                class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                        </div>
                    </div>
                </div>

                <!-- Mandatory Terms Checkbox (Required) -->
                <div class="p-3.5 rounded-2xl bg-sky-50 border border-sky-200 my-2">
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" required class="mt-1 h-4 w-4 text-sky-600 focus:ring-sky-500 border-slate-300 rounded shrink-0 cursor-pointer">
                        <label for="terms" class="ml-3 block text-xs text-slate-800 leading-relaxed font-bold">
                            Saya menyetujui persyaratan layanan dan memberikan persetujuan untuk pengumpulan data riwayat kesehatan awal.
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 px-4 bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm rounded-xl shadow-md shadow-sky-600/30 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <span>Daftar Sekarang & Mulai Program</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 pt-4 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-600">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-bold text-sky-600 hover:text-sky-700 hover:underline">
                        Masuk di sini
                    </a>
                </p>
            </div>

        </div>

    </div>
</section>
@endsection
