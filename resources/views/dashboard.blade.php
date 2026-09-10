@extends('layouts.app')

@section('title', 'Dashboard Pemantauan - AshBoard')

@section('content')
<div x-data="{ activeTab: 'overview', sidebarOpen: false }" class="min-h-[calc(100vh-5rem)] bg-slate-100/70 flex flex-col md:flex-row">

    <!-- Mobile Sidebar Toggle Bar -->
    <div class="md:hidden bg-slate-900 text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2 font-bold text-sm">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Menu Dashboard AshBoard
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="px-3 py-1.5 bg-slate-800 rounded-lg text-xs font-semibold hover:bg-slate-700">
            <span x-text="sidebarOpen ? 'Tutup Menu' : 'Buka Menu'"></span>
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <aside :class="sidebarOpen ? 'block' : 'hidden md:block'" class="w-full md:w-72 bg-slate-900 text-slate-300 flex-shrink-0 border-r border-slate-800 p-6 flex flex-col justify-between">
        <div class="space-y-8">
            
            <!-- User Profile Summary in Sidebar -->
            <div class="p-4 rounded-2xl bg-slate-800 border border-slate-700 flex items-center gap-3">
                <div class="w-11 h-11 rounded-xl bg-sky-600 text-white font-extrabold flex items-center justify-center text-lg shrink-0 shadow-md">
                    {{ $initials }}
                </div>
                <div class="overflow-hidden">
                    <h4 class="font-bold text-white text-sm truncate" title="{{ $userName }}">{{ $userName }}</h4>
                    <span class="inline-flex items-center gap-1 text-[11px] text-teal-400 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span>
                        Pasien Terapi Cytisine
                    </span>
                </div>
            </div>

            <!-- Sidebar Navigation Links for All 6 Features -->
            <nav class="space-y-1.5">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400 px-3 mb-2">Menu Utama</div>

                <!-- 1. Profil Pengguna -->
                <button @click="activeTab = 'profile'" :class="activeTab === 'profile' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Profil Pengguna</span>
                </button>

                <!-- 2. Skrining Awal -->
                <button @click="activeTab = 'screening'" :class="activeTab === 'screening' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    <span>Skrining Awal</span>
                </button>

                <!-- 3. Ringkasan Overview (Default) -->
                <button @click="activeTab = 'overview'" :class="activeTab === 'overview' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Ringkasan Overview</span>
                </button>

                <!-- 4. Edukasi Berhenti Merokok -->
                <button @click="activeTab = 'education'" :class="activeTab === 'education' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Edukasi Berhenti Merokok</span>
                </button>

                <!-- 5. Jadwal Konsultasi -->
                <button @click="activeTab = 'consultation'" :class="activeTab === 'consultation' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="flex-grow text-left">Jadwal Konsultasi</span>
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                </button>

                <!-- 6. Komunitas Pemantauan -->
                <button @click="activeTab = 'community'" :class="activeTab === 'community' ? 'bg-sky-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white'" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-semibold transition-all cursor-pointer">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Komunitas Pemantauan</span>
                </button>
            </nav>
        </div>

        <!-- Sidebar Footer Status -->
        <div class="pt-6 mt-6 border-t border-slate-800">
            <div class="p-3 rounded-xl bg-slate-800 text-xs text-slate-300 space-y-1">
                <div class="font-bold text-white">Terapi Orodispersible Film</div>
                <div class="text-sky-400 font-semibold">{{ $metrics['film_dosage'] ?? 'Cytisine 1.5 mg' }}</div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow p-4 sm:p-6 lg:p-8 space-y-8 overflow-y-auto">
        
        <!-- Flash Alert Message -->
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold shrink-0">
                        ✓
                    </div>
                    <p class="text-sm font-bold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 1: RINGKASAN OVERVIEW (Default) -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'overview'" class="space-y-8">
            
            <!-- Header Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-200">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Pemantauan</h1>
                    <p class="text-sm text-slate-500 mt-1">Selamat datang kembali, <strong class="text-slate-900">{{ $userName }}</strong>. Berikut adalah ikhtisar perkembangan terapi Anda.</p>
                </div>
                <span class="px-3.5 py-1.5 rounded-full bg-sky-100 border border-sky-200 text-sky-800 text-xs font-bold self-start sm:self-auto">
                    {{ $metrics['therapy_phase'] ?? 'Fase 1 Terapi' }}
                </span>
            </div>

            <!-- Metric Summary Cards (Hari Bebas Asap Rokok, Target Konsumsi, Penghematan Biaya) -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Hari Bebas Asap Rokok -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Hari Bebas Asap Rokok</span>
                        <div class="w-10 h-10 rounded-2xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                            🛡️
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $metrics['smoke_free_days'] }} Hari</div>
                    <p class="text-xs text-emerald-600 font-bold">↑ 100% Bebas Rokok <span class="text-slate-500 font-normal">(Target 25 hari)</span></p>
                </div>

                <!-- Card 2: Target Konsumsi -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Target Konsumsi</span>
                        <div class="w-10 h-10 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold">
                            💊
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $metrics['daily_target'] }}</div>
                    <p class="text-xs text-sky-700 font-bold">Cytisine Oral Dissolvable Film</p>
                </div>

                <!-- Card 3: Penghematan Biaya -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Penghematan Biaya</span>
                        <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                            💰
                        </div>
                    </div>
                    <div class="text-3xl font-extrabold text-slate-900">{{ $metrics['cost_savings'] }}</div>
                    <p class="text-xs text-emerald-600 font-bold">Dihemat dari {{ $metrics['cigs_avoided'] }} batang rokok</p>
                </div>
            </section>

            <!-- Chart & Notification Row -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Visual Reduction Trend Chart -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Tren Pengurangan Konsumsi Rokok</h3>
                            <p class="text-xs text-slate-500">Visualisasi penurunan konsumsi batang rokok per hari (7 Hari Terakhir).</p>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">Progress Baik (-100%)</span>
                    </div>

                    <div class="pt-4 pb-2">
                        <div class="h-52 flex items-end justify-between gap-3 sm:gap-6 px-2 sm:px-4 border-b border-slate-200 relative">
                            <div class="absolute inset-x-0 top-0 border-b border-slate-100 border-dashed text-[10px] text-slate-400 pl-1">12 btg</div>
                            <div class="absolute inset-x-0 top-1/2 border-b border-slate-100 border-dashed text-[10px] text-slate-400 pl-1">6 btg</div>

                            @foreach($trendData as $item)
                                @php
                                    $heightPercent = min(100, max(8, ($item['cigs'] / 12) * 100));
                                    $isZero = $item['cigs'] == 0;
                                @endphp
                                <div class="flex-1 flex flex-col items-center gap-2 group relative">
                                    <div class="w-full max-w-[36px] bg-slate-100 rounded-t-xl overflow-hidden flex flex-col justify-end h-full">
                                        <div style="height: {{ $heightPercent }}%;" class="{{ $isZero ? 'bg-emerald-500' : 'bg-sky-600' }} rounded-t-xl transition-all"></div>
                                    </div>
                                    <div class="text-center">
                                        <span class="block text-xs font-bold text-slate-700">{{ $item['short'] }}</span>
                                        <span class="block text-[10px] font-semibold {{ $isZero ? 'text-emerald-600' : 'text-slate-500' }}">{{ $item['cigs'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Notifications & Reminders Panel -->
                <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <h3 class="text-lg font-bold text-slate-900">Notifikasi & Pengingat</h3>
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-ping"></span>
                        </div>

                        <div class="space-y-3">
                            @foreach($notifications as $notif)
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-extrabold text-slate-900 flex items-center gap-2">
                                            {{ $notif['type'] == 'film' ? '💊' : ($notif['type'] == 'doctor' ? '👨‍⚕️' : '📋') }}
                                            {{ $notif['title'] }}
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $notif['badge_color'] }}">
                                            {{ $notif['status'] }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">{{ $notif['description'] }}</p>
                                    <div class="pt-1 flex items-center justify-between text-[11px] text-slate-500 font-medium">
                                        <span class="text-sky-700 font-bold">⏰ {{ $notif['time'] }}</span>
                                        @if($notif['type'] == 'film')
                                            <form method="POST" action="{{ route('dashboard.film.confirm') }}">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-sky-600 hover:bg-sky-700 text-white rounded-lg text-[11px] font-bold transition-colors cursor-pointer">
                                                    Konfirmasi Diminum
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 2: PROFIL PENGGUNA -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'profile'" x-cloak class="space-y-8">
            <div class="border-b border-slate-200 pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Profil Pengguna</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola data pribadi dan sasaran program berhenti merokok Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Profile Form -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">Informasi Akun</h3>
                    
                    <form method="POST" action="{{ route('dashboard.profile.update') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-semibold text-slate-900 focus:ring-2 focus:ring-sky-500">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Alamat Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-semibold text-slate-900 focus:ring-2 focus:ring-sky-500">
                        </div>

                        <button type="submit" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md transition-colors cursor-pointer">
                            Simpan Perubahan Profil
                        </button>
                    </form>
                </div>

                <!-- Status Card -->
                <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">Status Terapi Pasien</h3>
                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="text-slate-500">Terapi Aktif:</span>
                            <span class="font-bold text-slate-900">Cytisine Orodispersible Film</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="text-slate-500">Status Skrining:</span>
                            <span class="font-bold text-sky-700">{{ $user->screening_status ?? 'Sudah Skrining' }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="text-slate-500">Target Harian:</span>
                            <span class="font-bold text-emerald-700">{{ $user->daily_target ?? '2 Film / Hari' }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-slate-500">Hari Bebas Asap:</span>
                            <span class="font-bold text-slate-900">{{ $user->smoke_free_days }} Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 3: SKRINING AWAL NIKOTIN (FTND) -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'screening'" x-cloak class="space-y-8">
            <div class="border-b border-slate-200 pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Skrining Awal Nikotin (FTND)</h1>
                <p class="text-sm text-slate-500 mt-1">Evaluasi mandiri Fagerström Test for Nicotine Dependence untuk penyesuaian dosis terapi Orodispersible Film.</p>
            </div>

            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                <form method="POST" action="{{ route('dashboard.screening.save') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-800">1. Berapa batang rokok yang biasa Anda hisap per hari sebelum terapi?</label>
                        <input type="number" name="cigs_per_day" value="15" required class="w-full max-w-xs px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-bold">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-800">2. Seberapa cepat setelah bangun tidur Anda menyalakan rokok pertama?</label>
                        <select name="morning_cig_time" required class="w-full max-w-md px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-bold">
                            <option value="5min">Dalam waktu 5 menit (Sangat Tinggi)</option>
                            <option value="30min" selected>Dalam waktu 6 - 30 menit (Sedang)</option>
                            <option value="60min">Dalam waktu 31 - 60 menit (Ringan)</option>
                        </select>
                    </div>

                    <div class="p-4 rounded-2xl bg-sky-50 border border-sky-200 text-xs text-sky-900 space-y-1">
                        <div class="font-bold">Status Skrining Saat Ini:</div>
                        <div>{{ $user->screening_status ?? 'Sudah Skrining (FTND: Sedang)' }} — Target: {{ $user->daily_target }}</div>
                    </div>

                    <button type="submit" class="px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md transition-colors cursor-pointer">
                        Simpan & Hitung Ulang Skrining
                    </button>
                </form>
            </div>
        </div>

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 4: EDUKASI BERHENTI MEROKOK -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'education'" x-cloak class="space-y-8">
            <div class="border-b border-slate-200 pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Edukasi Berhenti Merokok</h1>
                <p class="text-sm text-slate-500 mt-1">Modul panduan medis dan strategi mengatasi keinginan merokok.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($educationModules as $module)
                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-xs">
                                <span class="px-2.5 py-1 rounded-full bg-sky-100 text-sky-800 font-bold">{{ $module['category'] }}</span>
                                <span class="text-slate-400 font-semibold">{{ $module['duration'] }}</span>
                            </div>
                            <h3 class="text-base font-bold text-slate-900">{{ $module['title'] }}</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">{{ $module['summary'] }}</p>
                        </div>

                        <button class="w-full py-2.5 bg-slate-100 hover:bg-sky-50 hover:text-sky-700 text-slate-700 font-bold rounded-xl text-xs transition-colors">
                            Baca Modul Lengkap →
                        </button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 5: JADWAL KONSULTASI -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'consultation'" x-cloak class="space-y-8">
            <div class="border-b border-slate-200 pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Jadwal Konsultasi Medis</h1>
                <p class="text-sm text-slate-500 mt-1">Konsultasi langsung bersama dokter spesialis paru & apoteker pendamping terapi.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Book Consultation Form -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">Buat Janji Konsultasi Baru</h3>

                    <form method="POST" action="{{ route('dashboard.consultation.book') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Pilih Tenaga Kesehatan</label>
                            <select name="doctor_name" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-bold">
                                @foreach($doctors as $doc)
                                    <option value="{{ $doc['name'] }}">{{ $doc['name'] }} ({{ $doc['role'] }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Tanggal</label>
                                <input type="text" name="date" placeholder="15 Sept 2026" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-bold">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Jam</label>
                                <input type="text" name="time" placeholder="10:00 WIB" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-bold">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Catatan Keluhan / Pertanyaan</label>
                            <textarea name="notes" rows="3" placeholder="Tuliskan keluhan seperti rasa pusing, craving, atau konsultasi dosis..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm font-medium"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl text-sm shadow-md transition-colors cursor-pointer">
                            Pesan Jadwal Konsultasi
                        </button>
                    </form>
                </div>

                <!-- Consultation History -->
                <div class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-3">Jadwal Sesi Anda</h3>

                    <div class="space-y-3">
                        @foreach($consultationBookings as $booking)
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-1.5 text-xs">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-slate-900">{{ $booking['doctor'] }}</span>
                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold text-[10px]">{{ $booking['status'] }}</span>
                                </div>
                                <div class="text-sky-700 font-bold">📅 {{ $booking['date'] }} ({{ $booking['time'] }})</div>
                                <p class="text-slate-600">{{ $booking['notes'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------------------- -->
        <!-- TAB 6: KOMUNITAS PEMANTAUAN -->
        <!-- -------------------------------------------------------------------------- -->
        <div x-show="activeTab === 'community'" x-cloak class="space-y-8">
            <div class="border-b border-slate-200 pb-4">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Komunitas Pemantauan Bebas Asap</h1>
                <p class="text-sm text-slate-500 mt-1">Ruang saling mendukung, berbagi progress harian, dan motivasi antar pejuang bebas rokok.</p>
            </div>

            <!-- Post New Message Form -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-slate-900">Bagikan Pengalaman / Progress Anda Hari Ini</h3>
                <form method="POST" action="{{ route('dashboard.community.post') }}" class="space-y-3">
                    @csrf
                    <textarea name="message" rows="3" required placeholder="Tuliskan pengalaman atau motivasi Anda hari ini..." class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-sm font-medium focus:ring-2 focus:ring-sky-500"></textarea>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-sky-600 hover:bg-sky-700 text-white font-bold text-xs rounded-xl shadow-md transition-colors cursor-pointer">
                            Bagikan ke Komunitas
                        </button>
                    </div>
                </form>
            </div>

            <!-- Community Posts Feed -->
            <div class="space-y-4">
                @foreach($communityPosts as $post)
                    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-sky-600 text-white font-extrabold flex items-center justify-center text-xs">
                                    {{ $post['initials'] }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-900 text-sm">{{ $post['author'] }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $post['time'] }}</div>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">
                                {{ $post['badge'] }}
                            </span>
                        </div>

                        <p class="text-sm text-slate-700 leading-relaxed">{{ $post['content'] }}</p>

                        <div class="pt-2 border-t border-slate-100 flex items-center gap-6 text-xs font-bold text-slate-500">
                            <button class="hover:text-sky-600 flex items-center gap-1.5 cursor-pointer">
                                ❤️ {{ $post['likes'] }} Dukungan
                            </button>
                            <button class="hover:text-sky-600 flex items-center gap-1.5 cursor-pointer">
                                💬 {{ $post['comments'] }} Komentar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

</div>
@endsection
