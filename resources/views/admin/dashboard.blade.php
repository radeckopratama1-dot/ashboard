@extends('layouts.app')

@section('title', 'Panel Pengawasan Admin - AshBoard')

@section('content')
<div x-data="{ search: '' }" class="min-h-[calc(100vh-5rem)] bg-slate-100/80 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- Top Header & Admin Welcome Bar -->
        <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 border border-slate-800">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-bold border border-sky-400/30">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Portal Supervisi & Pemantauan Medis
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Panel Admin AshBoard</h1>
                <p class="text-sm text-slate-300">
                    Memantau pendaftaran pasien, tren perkembangan berhenti merokok, dan efektivitas terapi Orodispersible Film (Cytisine).
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('dashboard') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 rounded-xl text-xs font-bold border border-slate-700 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Lihat Mode Pasien</span>
                </a>
            </div>
        </div>

        <!-- System-wide Aggregated Statistics -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Total Users -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Pasien Terdaftar</span>
                    <div class="w-10 h-10 rounded-2xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                        👥
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($totalUsers) }}</div>
                <p class="text-xs text-sky-700 font-semibold">Pengguna Aktif di SQLite DB</p>
            </div>

            <!-- Card 2: Cumulative Smoke Free Days -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Hari Bebas Asap</span>
                    <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                        🛡️
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($totalSmokeFreeDays) }} Hari</div>
                <p class="text-xs text-emerald-600 font-bold">Akumulasi Seluruh Pasien</p>
            </div>

            <!-- Card 3: Total Cost Savings -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Penghematan</span>
                    <div class="w-10 h-10 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold">
                        💰
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-slate-900">Rp {{ number_format($totalSavings, 0, ',', '.') }}</div>
                <p class="text-xs text-teal-600 font-bold">Dihemat dari Batang Rokok</p>
            </div>

            <!-- Card 4: Total Cigarettes Avoided -->
            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Batang Rokok Dicegah</span>
                    <div class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                        🚭
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($totalCigsAvoided) }}</div>
                <p class="text-xs text-amber-700 font-bold">Batang Rokok Dihindari</p>
            </div>

        </section>

        <!-- User Progress Monitoring Table Section -->
        <section class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden space-y-6 p-6 sm:p-8">
            
            <!-- Section Header & Filter -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-6">
                <div>
                    <h3 class="text-xl font-bold text-slate-900">Pemantauan Perkembangan Pasien</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Daftar pengguna terdaftar di SQLite database beserta status terapi dan skrining.</p>
                </div>

                <!-- Search Input -->
                <div class="relative max-w-xs w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" x-model="search" placeholder="Cari nama atau email pasien..."
                        class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-500">
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50/80 text-slate-600 font-bold uppercase tracking-wider">
                            <th class="py-3.5 px-4">Nama Pasien</th>
                            <th class="py-3.5 px-4">Tgl Terdaftar</th>
                            <th class="py-3.5 px-4">Bebas Rokok</th>
                            <th class="py-3.5 px-4">Target Dosis ODF</th>
                            <th class="py-3.5 px-4">Penghematan</th>
                            <th class="py-3.5 px-4">Status Skrining FTND</th>
                            <th class="py-3.5 px-4">Fase Terapi Cytisine</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-800 font-medium">
                        @forelse($users as $patient)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <!-- User Info -->
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-sky-600 text-white font-bold flex items-center justify-center text-xs shrink-0">
                                            {{ $patient->initials }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900 text-sm">{{ $patient->name }}</div>
                                            <div class="text-[11px] text-slate-500">{{ $patient->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Registered Date -->
                                <td class="py-4 px-4 text-slate-600">
                                    {{ $patient->created_at ? $patient->created_at->format('d M Y') : 'Terdaftar' }}
                                </td>

                                <!-- Days Smoke Free -->
                                <td class="py-4 px-4">
                                    <span class="font-extrabold text-sky-700 text-sm">{{ $patient->smoke_free_days }} Hari</span>
                                </td>

                                <!-- Daily Target -->
                                <td class="py-4 px-4 text-slate-700 font-semibold">
                                    {{ $patient->daily_target }}
                                </td>

                                <!-- Cost Savings -->
                                <td class="py-4 px-4 text-emerald-700 font-extrabold">
                                    Rp {{ number_format($patient->cost_savings, 0, ',', '.') }}
                                </td>

                                <!-- Screening Status -->
                                <td class="py-4 px-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-sky-100 text-sky-800 border border-sky-200 inline-block">
                                        {{ $patient->screening_status }}
                                    </span>
                                </td>

                                <!-- Therapy Phase -->
                                <td class="py-4 px-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-teal-100 text-teal-800 border border-teal-200 inline-block">
                                        {{ $patient->therapy_phase }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-slate-500 font-medium">
                                    Belum ada pasien terdaftar di SQLite Database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

    </div>
</div>
@endsection
