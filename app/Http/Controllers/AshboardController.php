<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AshboardController extends Controller
{
    /**
     * Display the Landing Page (welcome.blade.php).
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Display Public Patient Login Page (auth/login.blade.php).
     */
    public function login()
    {
        if (Auth::check()) {
            return Auth::user()->is_admin 
                ? redirect()->route('admin.dashboard') 
                : redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Handle Public Patient Login submission.
     */
    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', strtolower(trim($request->input('email'))))->first();

        if ($user && $user->is_admin) {
            return back()->withErrors([
                'email' => 'Akun Administrator hanya dapat masuk melalui portal khusus di /admin',
            ])->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '! Program Anda siap dilanjutkan.');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Display Dedicated Admin Login Page (auth/admin-login.blade.php).
     */
    public function adminLogin()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }

    /**
     * Handle Dedicated Admin Login submission (/admin/login).
     */
    public function doAdminLogin(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginInput = trim($request->input('login'));
        $password = $request->input('password');

        $user = User::where(function ($query) use ($loginInput) {
            $query->where('username', $loginInput)
                  ->orWhere('email', strtolower($loginInput));
        })->first();

        if ($user && $user->is_admin && Hash::check($password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang di Panel Utama Admin AshBoard!');
        }

        return back()->withErrors([
            'login' => 'Kredensial Admin tidak valid.',
        ])->onlyInput('login');
    }

    /**
     * Display the Register Page (auth/register.blade.php).
     */
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    /**
     * Handle Registration form submission.
     */
    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'username' => strtolower(str_replace(' ', '', trim($request->input('name')))),
            'email' => strtolower(trim($request->input('email'))),
            'password' => Hash::make($request->input('password')),
            'is_admin' => false,
            'smoke_free_days' => 1,
            'daily_target' => '2 Film / Hari',
            'cost_savings' => 30000,
            'cigs_avoided' => 20,
            'therapy_phase' => 'Fase 1 (Hari 1 - 3)',
            'screening_status' => 'Belum Skrining Lengkap',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil! Selamat datang ' . $user->name . ' di platform AshBoard.');
    }

    /**
     * Display the Patient User Dashboard with all 6 features.
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        if (!$user) {
            $user = User::where('is_admin', false)->first() ?? new User([
                'name' => 'Radecko Pratama',
                'email' => 'radecko@ashboard.id',
                'smoke_free_days' => 14,
                'daily_target' => '2 Film / Hari',
                'cost_savings' => 450000,
                'cigs_avoided' => 280,
                'therapy_phase' => 'Fase 2 (Hari 4 - 12)',
                'screening_status' => 'Sudah Skrining (FTND: Sedang)',
            ]);
        }

        $userName = $user->name;
        $initials = $user->initials;

        $metrics = [
            'smoke_free_days' => $user->smoke_free_days ?? 1,
            'daily_target' => $user->daily_target ?? '2 Film / Hari',
            'cost_savings' => 'Rp ' . number_format($user->cost_savings ?? 30000, 0, ',', '.'),
            'cigs_avoided' => $user->cigs_avoided ?? 20,
            'therapy_phase' => $user->therapy_phase ?? 'Fase 1 (Hari 1 - 3)',
            'film_dosage' => 'Cytisine 1.5 mg Oral Dissolvable Film',
        ];

        $notifications = [
            [
                'id' => 1,
                'type' => 'film',
                'title' => 'Jadwal Konsumsi Film Oral Cytisine',
                'time' => 'Hari Ini, 14:00 WIB',
                'description' => 'Dosis ke-3 (Oral Film larut di bawah lidah / mukosa pipi). Jangan dikunyah.',
                'status' => 'Mendatang',
                'badge_color' => 'bg-sky-100 text-sky-800 border-sky-200',
            ],
            [
                'id' => 2,
                'type' => 'doctor',
                'title' => 'Jadwal Evaluasi Tenaga Kesehatan',
                'time' => 'Besok, 10:00 WIB',
                'description' => 'Sesi evaluasi klinis & konsultasi kemajuan terapi bersama dr. Aris Budiman, Sp.P.',
                'status' => 'Terkonfirmasi',
                'badge_color' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            ],
            [
                'id' => 3,
                'type' => 'screening',
                'title' => 'Evaluasi Mingguan Ketergantungan Nikotin (FTND)',
                'time' => 'Sabtu, 12 Sept 2026',
                'description' => 'Pengisian kuesioner perkembangan gejala withdrawal dan toleransi terapi film.',
                'status' => 'Pengingat',
                'badge_color' => 'bg-amber-100 text-amber-800 border-amber-200',
            ],
        ];

        $trendData = [
            ['day' => 'Senin', 'short' => 'Sen', 'cigs' => 12],
            ['day' => 'Selasa', 'short' => 'Sel', 'cigs' => 9],
            ['day' => 'Rabu', 'short' => 'Rab', 'cigs' => 6],
            ['day' => 'Kamis', 'short' => 'Kam', 'cigs' => 4],
            ['day' => 'Jumat', 'short' => 'Jum', 'cigs' => 2],
            ['day' => 'Sabtu', 'short' => 'Sab', 'cigs' => 1],
            ['day' => 'Minggu', 'short' => 'Min', 'cigs' => 0],
        ];

        // Sample Education Modules
        $educationModules = [
            [
                'id' => 1,
                'title' => 'Mekanisme Kerja Cytisine Oral Dissolvable Film',
                'category' => 'Farmakologi',
                'duration' => '5 Menit Baca',
                'summary' => 'Pelajari bagaimana alkaloid Cytisine mengikat reseptor nicotinic acetylcholine (nAChRs) di otak untuk meredakan keinginan merokok tanpa efek samping berbahaya.',
                'read' => true,
            ],
            [
                'id' => 2,
                'title' => 'Manajemen Gejala Withdrawal & Urge Surfing',
                'category' => 'Psikologi',
                'duration' => '7 Menit Baca',
                'summary' => 'Teknik pernapasan 4-7-8 dan pengalihan fokus saat keinginan merokok mendadak datang di jam-jam rawan.',
                'read' => false,
            ],
            [
                'id' => 3,
                'title' => 'Nutrisi & Antioksidan untuk Detoksifikasi Nikotin',
                'category' => 'Gizi Sehat',
                'duration' => '4 Menit Baca',
                'summary' => 'Daftar makanan dan buah tinggi Vitamin C yang membantu regenerasi sel paru-paru dan mempecepat pembakaran nikotin.',
                'read' => false,
            ],
            [
                'id' => 4,
                'title' => 'Mencegah Kambuh (Relapse Prevention)',
                'category' => 'Tips Gaya Hidup',
                'duration' => '6 Menit Baca',
                'summary' => 'Panduan menghadapi situasi sosial, lingkungan teman merokok, dan kondisi stres tanpa harus menyalakan rokok.',
                'read' => false,
            ],
        ];

        // Consultations & Available Doctors
        $doctors = [
            [
                'name' => 'dr. Aris Budiman, Sp.P',
                'role' => 'Spesialis Paru & Konsultan Terapi Nikotin',
                'availability' => 'Senin - Jumat, 09:00 - 16:00 WIB',
                'rating' => '4.9 ★',
            ],
            [
                'name' => 'apt. Siska Rahmawati, S.Farm',
                'role' => 'Apoteker Klinik & Expert Cytisine ODF',
                'availability' => 'Setiap Hari, 08:00 - 20:00 WIB',
                'rating' => '5.0 ★',
            ],
        ];

        $consultationBookings = session('consultation_bookings', [
            [
                'doctor' => 'dr. Aris Budiman, Sp.P',
                'date' => '11 September 2026',
                'time' => '10:00 WIB',
                'status' => 'Terkonfirmasi',
                'notes' => 'Evaluasi dosis film cytisine minggu ke-2.',
            ],
        ]);

        // Community Feed Posts
        $communityPosts = session('community_posts', [
            [
                'author' => 'Radecko Alviano',
                'initials' => 'RA',
                'time' => '2 jam yang lalu',
                'content' => 'Hari ke-18 bebas rokok! Awalnya ragu dengan film oral cytisine, tapi ternyata craving sore hari hilang dalam hitungan detik setelah film larut di mulut. Semangat semuanya!',
                'likes' => 24,
                'comments' => 5,
                'badge' => 'Bebas Rokok 18 Hari',
            ],
            [
                'author' => 'Haura Tsabitah',
                'initials' => 'HT',
                'time' => '5 jam yang lalu',
                'content' => 'Terima kasih dr. Aris atas sesi konsultasi kemarin. Dosis 2 film per hari sangat pas untuk saya. Penghematan uang rokok sudah tembus Rp 450 ribu!',
                'likes' => 18,
                'comments' => 3,
                'badge' => 'Bebas Rokok 14 Hari',
            ],
            [
                'author' => 'Budi Santoso',
                'initials' => 'BS',
                'time' => '1 hari yang lalu',
                'content' => 'Baru mulai program hari ke-3. Gejala pusing di hari pertama sudah berkurang. Mohon doanya teman-teman!',
                'likes' => 31,
                'comments' => 12,
                'badge' => 'Bebas Rokok 3 Hari',
            ],
        ]);

        return view('dashboard', compact(
            'user',
            'userName',
            'initials',
            'metrics',
            'notifications',
            'trendData',
            'educationModules',
            'doctors',
            'consultationBookings',
            'communityPosts'
        ));
    }

    /**
     * Update User Profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = trim($request->input('name'));
        $user->email = strtolower(trim($request->input('email')));
        $user->save();

        return back()->with('success', 'Profil pengguna Anda berhasil diperbarui!');
    }

    /**
     * Save FTND Nicotine Screening Assessment.
     */
    public function saveScreening(Request $request)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        $request->validate([
            'cigs_per_day' => 'required|numeric|min:1',
            'morning_cig_time' => 'required',
        ]);

        $cigs = (int) $request->input('cigs_per_day');
        $morningTime = $request->input('morning_cig_time');

        // Simple FTND score calculation logic
        $score = 0;
        if ($morningTime == '5min') $score += 3;
        elseif ($morningTime == '30min') $score += 2;
        elseif ($morningTime == '60min') $score += 1;

        if ($cigs > 30) $score += 3;
        elseif ($cigs >= 21) $score += 2;
        elseif ($cigs >= 11) $score += 1;

        if ($score >= 7) {
            $status = 'Sudah Skrining (FTND: Berat)';
            $target = '4-6 Film / Hari';
        } elseif ($score >= 4) {
            $status = 'Sudah Skrining (FTND: Sedang)';
            $target = '2-4 Film / Hari';
        } else {
            $status = 'Sudah Skrining (FTND: Ringan)';
            $target = '1-2 Film / Hari';
        }

        $user->screening_status = $status;
        $user->daily_target = $target;
        $user->save();

        return back()->with('success', 'Skrining Nikotin FTND berhasil disimpan! Rekomendasi dosis terapi: ' . $target);
    }

    /**
     * Book Medical Consultation.
     */
    public function bookConsultation(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $bookings = session('consultation_bookings', []);
        array_unshift($bookings, [
            'doctor' => $request->input('doctor_name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'status' => 'Terkonfirmasi',
            'notes' => $request->input('notes') ?: 'Konsultasi rutin keluhan & perkembangan terapi film.',
        ]);

        session(['consultation_bookings' => $bookings]);

        return back()->with('success', 'Jadwal konsultasi bersama ' . $request->input('doctor_name') . ' berhasil dipesan!');
    }

    /**
     * Post Message to Community Support Group.
     */
    public function postCommunityMessage(Request $request)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $posts = session('community_posts', []);
        array_unshift($posts, [
            'author' => $user->name,
            'initials' => $user->initials,
            'time' => 'Baru saja',
            'content' => trim($request->input('message')),
            'likes' => 1,
            'comments' => 0,
            'badge' => 'Bebas Rokok ' . ($user->smoke_free_days ?? 1) . ' Hari',
        ]);

        session(['community_posts' => $posts]);

        return back()->with('success', 'Pesan motivasi Anda berhasil dibagikan ke Komunitas!');
    }

    /**
     * Confirm Film Dosage Consumption.
     */
    public function confirmFilmDosage(Request $request)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('login');

        $user->smoke_free_days = ($user->smoke_free_days ?? 0) + 1;
        $user->cigs_avoided = ($user->cigs_avoided ?? 0) + 20;
        $user->cost_savings = ($user->smoke_free_days) * 30000;
        
        if ($user->smoke_free_days >= 13) {
            $user->therapy_phase = 'Fase 3 (Hari 13 - 25)';
        } elseif ($user->smoke_free_days >= 4) {
            $user->therapy_phase = 'Fase 2 (Hari 4 - 12)';
        } else {
            $user->therapy_phase = 'Fase 1 (Hari 1 - 3)';
        }

        $user->save();

        return back()->with('success', 'Konfirmasi konsumsi film oral berhasil! Bebas rokok bertambah menjadi ' . $user->smoke_free_days . ' Hari.');
    }

    /**
     * Display the Admin Monitoring Dashboard.
     */
    public function adminDashboard()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('admin.login')->withErrors([
                'login' => 'Akses ditolak. Silakan masuk terlebih dahulu melalui Portal Khusus Admin.',
            ]);
        }

        $admin = Auth::user();

        $totalUsers = User::where('is_admin', false)->count();
        $totalSmokeFreeDays = User::where('is_admin', false)->sum('smoke_free_days');
        $totalSavings = User::where('is_admin', false)->sum('cost_savings');
        $totalCigsAvoided = User::where('is_admin', false)->sum('cigs_avoided');

        $users = User::where('is_admin', false)->latest()->get();

        return view('admin.dashboard', compact(
            'admin',
            'totalUsers',
            'totalSmokeFreeDays',
            'totalSavings',
            'totalCigsAvoided',
            'users'
        ));
    }

    /**
     * Handle Logout.
     */
    public function logout(Request $request)
    {
        $wasAdmin = Auth::check() && Auth::user()->is_admin;
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($wasAdmin) {
            return redirect()->route('admin.login')->with('info', 'Anda telah keluar dari Portal Admin.');
        }

        return redirect()->route('welcome')->with('info', 'Anda telah keluar dari sistem AshBoard.');
    }
}
