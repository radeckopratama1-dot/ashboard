<?php

use App\Http\Controllers\AshboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AshBoard Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [AshboardController::class, 'welcome'])->name('welcome');

// Public Patient Authentication Routes
Route::get('/login', [AshboardController::class, 'login'])->name('login');
Route::post('/login', [AshboardController::class, 'doLogin'])->name('login.perform');

Route::get('/register', [AshboardController::class, 'register'])->name('register');
Route::post('/register', [AshboardController::class, 'doRegister'])->name('register.perform');

Route::post('/logout', [AshboardController::class, 'logout'])->name('logout');

// Patient Dashboard Routes & Interactive Feature Actions
Route::get('/dashboard', [AshboardController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/profile', [AshboardController::class, 'updateProfile'])->name('dashboard.profile.update');
Route::post('/dashboard/screening', [AshboardController::class, 'saveScreening'])->name('dashboard.screening.save');
Route::post('/dashboard/consultation', [AshboardController::class, 'bookConsultation'])->name('dashboard.consultation.book');
Route::post('/dashboard/community', [AshboardController::class, 'postCommunityMessage'])->name('dashboard.community.post');
Route::post('/dashboard/confirm-film', [AshboardController::class, 'confirmFilmDosage'])->name('dashboard.film.confirm');

// Dedicated Admin Routes (Only accessible via /admin)
Route::get('/admin', [AshboardController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/login', [AshboardController::class, 'adminLogin']);
Route::post('/admin/login', [AshboardController::class, 'doAdminLogin'])->name('admin.login.perform');

Route::get('/admin/dashboard', [AshboardController::class, 'adminDashboard'])->name('admin.dashboard');
