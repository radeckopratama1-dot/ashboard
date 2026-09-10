@extends('layouts.app')

@section('title', 'Portal Masuk Administrator - AshBoard')

@section('content')
<section class="min-h-[calc(100vh-5rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-900 text-white relative overflow-hidden">
    
    <!-- Background Ambient Glow -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full bg-slate-800/90 rounded-3xl shadow-2xl border border-slate-700 p-8 sm:p-10 relative z-10 space-y-6">
        
        <!-- Top Header & Badge -->
        <div class="text-center space-y-3">
            <div class="w-14 h-14 rounded-2xl bg-sky-600 text-white mx-auto flex items-center justify-center font-bold text-2xl shadow-lg shadow-sky-600/30">
                🛡️
            </div>
            <div>
                <span class="px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-bold uppercase tracking-wider border border-sky-400/30">
                    Restricted Area
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight mt-2">Portal Admin</h2>
                <p class="text-xs text-slate-300">Masuk untuk memantau data & perkembangan pasien AshBoard.</p>
            </div>
        </div>

        <!-- Display Validation / Auth Errors -->
        @if ($errors->any())
            <div class="p-4 rounded-xl bg-rose-500/20 border border-rose-500/40 text-rose-200 text-xs font-semibold space-y-1">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('info'))
            <div class="p-4 rounded-xl bg-sky-500/20 border border-sky-500/40 text-sky-200 text-xs font-semibold">
                {{ session('info') }}
            </div>
        @endif

        <!-- Admin Login Form -->
        <form method="POST" action="{{ route('admin.login.perform') }}" class="space-y-5">
            @csrf

            <!-- Input Username / Email -->
            <div>
                <label for="login" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Username / Email Admin</label>
                <div class="relative rounded-xl shadow-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <input type="text" name="login" id="login" required placeholder="Masukkan Username atau Email Admin" value="{{ old('login') }}"
                        class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                </div>
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Password Admin</label>
                <div class="relative rounded-xl shadow-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" required placeholder="Masukkan Password Admin"
                        class="block w-full pl-11 pr-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500 text-sm transition-all">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3.5 px-4 bg-sky-600 hover:bg-sky-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-sky-600/30 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                <span>Masuk Portal Admin</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </form>

        <!-- Back to Public Site Link -->
        <div class="pt-4 border-t border-slate-700 text-center">
            <a href="{{ route('welcome') }}" class="text-xs font-semibold text-slate-400 hover:text-sky-400 transition-colors inline-flex items-center gap-1">
                ← Kembali ke Beranda Pasien
            </a>
        </div>

    </div>
</section>
@endsection
