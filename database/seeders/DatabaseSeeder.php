<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Dedicated Admin Account (Username: admin / Password: admin)
        User::create([
            'name' => 'Administrator AshBoard',
            'username' => 'admin',
            'email' => 'admin@ashboard.id',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'smoke_free_days' => 30,
            'daily_target' => 'Terapi Selesai',
            'cost_savings' => 900000,
            'cigs_avoided' => 600,
            'therapy_phase' => 'Supervisi Medis',
            'screening_status' => 'Tim Tenaga Kesehatan',
        ]);

        // 2. Create Sample Patient Users
        User::create([
            'name' => 'Radecko Alviano',
            'username' => 'radecko',
            'email' => 'radecko@ashboard.id',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'smoke_free_days' => 18,
            'daily_target' => '2 Film / Hari',
            'cost_savings' => 540000,
            'cigs_avoided' => 360,
            'therapy_phase' => 'Fase 2 (Hari 4 - 12)',
            'screening_status' => 'Sudah Skrining (FTND: Berat)',
        ]);

        User::create([
            'name' => 'Haura Tsabitah',
            'username' => 'haura',
            'email' => 'haura@ashboard.id',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'smoke_free_days' => 14,
            'daily_target' => '2 Film / Hari',
            'cost_savings' => 450000,
            'cigs_avoided' => 280,
            'therapy_phase' => 'Fase 2 (Hari 4 - 12)',
            'screening_status' => 'Sudah Skrining (FTND: Sedang)',
        ]);

        User::create([
            'name' => 'Ahmad Pratama',
            'username' => 'ahmad',
            'email' => 'ahmad@ashboard.id',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'smoke_free_days' => 7,
            'daily_target' => '4 Film / Hari',
            'cost_savings' => 210000,
            'cigs_avoided' => 140,
            'therapy_phase' => 'Fase 1 (Hari 1 - 3)',
            'screening_status' => 'Sudah Skrining (FTND: Sedang)',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi',
            'email' => 'budi@ashboard.id',
            'password' => Hash::make('password123'),
            'is_admin' => false,
            'smoke_free_days' => 3,
            'daily_target' => '6 Film / Hari',
            'cost_savings' => 90000,
            'cigs_avoided' => 60,
            'therapy_phase' => 'Fase 1 (Hari 1 - 3)',
            'screening_status' => 'Belum Skrining Lengkap',
        ]);
    }
}
