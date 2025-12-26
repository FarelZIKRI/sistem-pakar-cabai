<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Front\ConsultationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Front-end Routes
Route::get('/', function () {
    return view('front.home');
})->name('front.home');

Route::get('/konsultasi', [ConsultationController::class, 'index'])->name('front.consultation');
Route::post('/konsultasi/process', [ConsultationController::class, 'process'])->name('front.consultation.process');
Route::get('/hasil/{konsultasi}', [ConsultationController::class, 'result'])->name('front.consultation.result');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Penyakit CRUD
    Route::resource('penyakit', PenyakitController::class);

    // Gejala CRUD
    Route::resource('gejala', GejalaController::class);

    // Rule Base CRUD
    Route::resource('rule', RuleController::class);

    // Riwayat Konsultasi
    Route::resource('riwayat', RiwayatController::class)->only(['index', 'show', 'destroy']);

    // Profile Update
    Route::post('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
});
