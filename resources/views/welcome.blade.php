@extends('layouts.app')

@section('title', 'AshBoard: Langkah Nyata Berhenti Merokok | Terapi Film Oral Cytisine')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-slate-50 py-16 lg:py-24">
    <!-- Subtle Background Glow Elements -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-sky-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-96 h-96 bg-teal-200/30 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Hero Left Content -->
            <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                
                <!-- Badge -->
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-sky-100/90 border border-sky-200 text-sky-800 text-xs sm:text-sm font-semibold shadow-xs">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                    </span>
                    Platform Digital Pendamping Terapi Orodispersible Film (Cytisine)
                </div>

                <!-- Main Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    AshBoard: <span class="text-sky-600">Langkah Nyata</span> Berhenti Merokok
                </h1>

                <!-- Short Context Explanation -->
                <p class="text-lg sm:text-xl text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                    Mengintegrasikan pemantauan digital berbasis data klinis dan terapi inovasi <strong class="text-slate-900 font-semibold">Orodispersible Film</strong> (film oral larut berbasis cytisine) untuk membantu Anda lepas dari kecanduan merokok dengan lebih aman, nyaman, dan terukur.
                </p>

                <!-- Dual CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-white bg-sky-600 hover:bg-sky-700 shadow-lg shadow-sky-600/30 hover:shadow-xl transition-all duration-200 group">
                        <span>Mulai Program</span>
                        <svg class="w-5 h-5 ml-2.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-slate-700 bg-white hover:bg-slate-100 border border-slate-300 shadow-xs hover:border-slate-400 transition-all duration-200">
                        <span>Masuk</span>
                        <svg class="w-5 h-5 ml-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="pt-6 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs font-semibold text-slate-500 border-t border-slate-200/80">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Teruji Secara Klinis
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Formulasi Oral Film Cytisine
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Supervisi Dokter & Apoteker
                    </div>
                </div>

            </div>

            <!-- Hero Right Visual Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <!-- Decorative backdrop shadow -->
                    <div class="absolute inset-0 bg-sky-600/10 rounded-3xl transform rotate-2 scale-102 blur-lg"></div>

                    <!-- Main Feature Graphic Mockup Card -->
                    <div class="relative bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-200 space-y-6">
                        
                        <!-- Top Header Badge -->
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">Status Terapi Hari Ini</h4>
                                    <p class="text-xs text-slate-500">Cytisine Orodispersible Film</p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                Aktif - Dosis 3
                            </span>
                        </div>

                        <!-- Progress Bar Visual -->
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-semibold text-slate-600">
                                <span>Target Bebas Asap Rokok</span>
                                <span class="text-sky-600 font-bold">14 / 25 Hari</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden p-0.5 border border-slate-200">
                                <div class="bg-sky-600 h-2 rounded-full w-[56%]"></div>
                            </div>
                        </div>

                        <!-- 2 Card Highlights -->
                        <div class="grid grid-cols-2 gap-3 pt-1">
                            <div class="p-3.5 rounded-2xl bg-sky-50 border border-sky-100">
                                <div class="text-xs text-slate-500 font-medium">Bebas Rokok</div>
                                <div class="text-xl font-extrabold text-sky-900 mt-0.5">14 Hari</div>
                                <div class="text-[11px] text-emerald-600 font-semibold mt-1">↑ 100% Bebas Asap</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-teal-50 border border-teal-100">
                                <div class="text-xs text-slate-500 font-medium">Hemat Finansial</div>
                                <div class="text-xl font-extrabold text-teal-900 mt-0.5">Rp 450k</div>
                                <div class="text-[11px] text-teal-600 font-semibold mt-1">280 Batang Dihemat</div>
                            </div>
                        </div>

                        <!-- Orodispersible Film Card Banner -->
                        <div class="p-4 rounded-2xl bg-slate-900 text-white flex items-center justify-between">
                            <div class="space-y-1">
                                <span class="text-[10px] uppercase font-bold tracking-wider text-sky-400">Teknologi Terapi</span>
                                <h5 class="text-xs font-bold">Film Oral Larut (Cytisine)</h5>
                                <p class="text-[11px] text-slate-300">Larut cepat di mulut tanpa perlu air.</p>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center shrink-0 font-bold">
                                💊
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 Pilar Fitur Utama Section -->
<section id="pilar-fitur" class="py-20 bg-white border-y border-slate-200 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="px-3.5 py-1.5 rounded-full bg-sky-100 text-sky-800 font-semibold text-xs uppercase tracking-wider">
                Ekosistem Pendamping Komprehensif
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                4 Pilar Fitur Utama <span class="text-sky-600">AshBoard</span>
            </h2>
            <p class="text-slate-600 text-base sm:text-lg">
                Dirancang khusus oleh tim multidisiplin untuk memandu setiap tahap perjalanan berhenti merokok Anda hingga tuntas.
            </p>
        </div>

        <!-- 4 Pillars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Pilar 1: Skrining Awal -->
            <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-sky-50 border border-slate-200 hover:border-sky-300 transition-all duration-300 hover:shadow-lg">
                <div class="w-14 h-14 rounded-2xl bg-sky-600 text-white flex items-center justify-center mb-6 shadow-md shadow-sky-600/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-sky-700 transition-colors">1. Skrining Awal</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Penilaian mandiri tingkat ketergantungan nikotin (skala FTND) dan profil riwayat kesehatan awal untuk personalisasi dosis terapi film.
                </p>
            </div>

            <!-- Pilar 2: Evaluasi Tenaga Kesehatan -->
            <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-teal-50 border border-slate-200 hover:border-teal-300 transition-all duration-300 hover:shadow-lg">
                <div class="w-14 h-14 rounded-2xl bg-teal-600 text-white flex items-center justify-center mb-6 shadow-md shadow-teal-600/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-teal-700 transition-colors">2. Evaluasi Tenaga Kesehatan</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Sesi konsultasi & evaluasi berkala langsung oleh dokter dan apoteker untuk menjamin keamanan klinis serta efektivitas terapi.
                </p>
            </div>

            <!-- Pilar 3: Pemantauan Berkala -->
            <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-sky-50 border border-slate-200 hover:border-sky-300 transition-all duration-300 hover:shadow-lg">
                <div class="w-14 h-14 rounded-2xl bg-sky-700 text-white flex items-center justify-center mb-6 shadow-md shadow-sky-700/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-sky-700 transition-colors">3. Pemantauan Berkala</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Pelacakan harian grafik penurunan konsumsi rokok, jadwal minum film cytisine, dan estimasi akumulasi penghematan uang.
                </p>
            </div>

            <!-- Pilar 4: Dukungan Komunitas -->
            <div class="group p-8 rounded-3xl bg-slate-50 hover:bg-cyan-50 border border-slate-200 hover:border-cyan-300 transition-all duration-300 hover:shadow-lg">
                <div class="w-14 h-14 rounded-2xl bg-cyan-600 text-white flex items-center justify-center mb-6 shadow-md shadow-cyan-600/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-cyan-700 transition-colors">4. Dukungan Komunitas</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Ruang diskusi dan saling menguatkan antar pengguna, berbagi tips mengatasi craving, dan pendampingan motivasional.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Terapi Orodispersible Film Highlight Section -->
<section id="terapi-cytisine" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-900 rounded-3xl p-8 sm:p-12 lg:p-16 text-white shadow-2xl relative overflow-hidden">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
                <div class="lg:col-span-7 space-y-6">
                    <span class="px-3.5 py-1.5 rounded-full bg-sky-500/20 text-sky-300 font-semibold text-xs uppercase tracking-wider border border-sky-400/30">
                        Inovasi Terapi Farmakologi Modern
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                        Mengapa Terapi Orodispersible Film (Cytisine)?
                    </h2>
                    <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                        Cytisine adalah alkaloid alami yang bertindak sebagai agonis parsial reseptor <em class="text-sky-300 font-medium">nicotinic acetylcholine (nAChRs)</em>. Diformulasikan dalam bentuk <strong class="text-white">Orodispersible Film (ODF)</strong> larut di mulut yang praktis:
                    </p>
                    
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-teal-500/30 text-teal-300 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                            <span><strong>Onset Cepat:</strong> Melarut dalam hitungan detik tanpa membutuhkan air minum.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-teal-500/30 text-teal-300 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                            <span><strong>Mengurangi Craving:</strong> Efektif meredakan keinginan merokok dan gejala putus nikotin (withdrawal).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-teal-500/30 text-teal-300 flex items-center justify-center shrink-0 mt-0.5 font-bold">✓</span>
                            <span><strong>Kepatuhan Tinggi:</strong> Dosis terukur dan nyaman dikonsumsi kapan saja, di mana saja.</span>
                        </li>
                    </ul>
                </div>

                <div class="lg:col-span-5 flex justify-center">
                    <div class="bg-slate-800/80 p-6 rounded-3xl border border-slate-700 text-center max-w-sm space-y-4">
                        <div class="w-16 h-16 rounded-2xl bg-sky-600 text-white mx-auto flex items-center justify-center font-bold text-2xl shadow-lg">
                            💊
                        </div>
                        <h4 class="text-lg font-bold text-white">Formulasi Film Oral Larut</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Standardisasi dosis tepat cytisine 1.5 mg per lembar film oral untuk keberhasilan program berhenti merokok hingga 25 hari.
                        </p>
                        <a href="{{ route('register') }}" class="inline-block w-full py-3 rounded-xl bg-sky-600 hover:bg-sky-500 text-white font-bold text-sm transition-colors">
                            Konsultasikan Sekarang
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Final Call to Action -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <h2 class="text-3xl font-extrabold text-slate-900">Siap Mengambil Langkah Nyata Bebas Asap Rokok?</h2>
        <p class="text-slate-600 max-w-2xl mx-auto text-base">
            Bergabunglah dengan AshBoard sekarang dan dapatkan pendampingan digital berbasis sains serta terapi film oral yang teruji.
        </p>
        <div class="pt-2">
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-white bg-sky-600 hover:bg-sky-700 shadow-lg shadow-sky-600/30 transition-all text-base">
                Daftar & Mulai Program Bebas Rokok
            </a>
        </div>
    </div>
</section>
@endsection
