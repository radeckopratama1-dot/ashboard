# AshBoard — Langkah Nyata Berhenti Merokok
> **Platform Digital Pendamping Terapi Orodispersible Film (Cytisine)**

AshBoard adalah platform digital terintegrasi pendamping program berhenti merokok yang menggabungkan pemantauan kesehatan harian, supervisi tenaga kesehatan, dan terapi **Orodispersible Film (film oral larut berbasis cytisine)**.

---

## 🌟 Fitur Utama

### 📱 Portal Pengguna / Pasien (`/dashboard`)
1. **Ringkasan Overview**: Kartu metrik *Hari Bebas Asap Rokok*, *Target Dosis Harian*, *Penghematan Biaya Finansial*, grafik tren penurunan rokok, dan pengingat dosis film.
2. **Profil Pengguna**: Manajemen data pribadi pasien dan status fase terapi cytisine.
3. **Skrining Awal Nikotin (FTND)**: Kuesioner mandiri *Fagerström Test for Nicotine Dependence* untuk penyesuaian dosis film oral.
4. **Edukasi Berhenti Merokok**: Modul bacaan klinis seputar farmakologi cytisine, manajemen craving, dan gizi pendukung.
5. **Jadwal Konsultasi Medis**: Pemesanan sesi konsultasi dengan dokter spesialis paru dan apoteker pendamping.
6. **Komunitas Pemantauan**: Forum grup pendukung antar pasien untuk berbagi pengalaman dan motivasi harian.

### 🛡️ Portal Administrator (`/admin`)
- Restriksi login admin terpisah via `/admin` (Username: `admin`, Password: `admin`).
- Pemantauan statistik agregat sistem (*Total Pasien Terdaftar, Total Hari Bebas Asap, Total Penghematan Finansial*).
- Tabel pengawasan perkembangan pasien secara *real-time*.

---

## 🛠️ Spesifikasi Teknologi

- **Backend**: Laravel 13 (PHP 8.4)
- **Database**: SQLite (`database/database.sqlite`)
- **Frontend & Styling**: Tailwind CSS, Alpine.js, Blade Templates
- **Build Tool**: Vite

---

## 💻 Cara Menjalankan Secara Lokal

```bash
# 1. Clone repositori
git clone https://github.com/radeckopratama1-dot/ashboard.git
cd ashboard

# 2. Install dependensi PHP & JavaScript
composer install
npm install

# 3. Jalankan migrasi dan seeder database SQLite
php artisan migrate:fresh --seed

# 4. Jalankan server lokal Laravel & Vite
php artisan serve
npm run dev
```

Aplikasi dapat diakses melalui `http://localhost:8000`.

---

## 📄 Hak Cipta

Copyright © 2026 by **Radecko & Haura**. All Rights Reserved.
