<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminFormulirController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\MahasiswaFormulirController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/admin/users/{id}/approve', [AdminUserController::class, 'approve'])->name('users.approve');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::get('admin/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('admin/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/admin/formulir', [AdminFormulirController::class, 'index'])->name('formulir.index');
    Route::post('/admin/formulir/{id}/approve', [AdminFormulirController::class, 'approve'])->name('formulir.approve');
    Route::post('/formulir/{id}/reject', [AdminFormulirController::class, 'reject'])->name('formulir.reject');
    Route::get('formulir/{id}', [AdminFormulirController::class, 'show'])->name('formulir.show');
    Route::get('/admin/formulir/{id}/edit', [AdminFormulirController::class, 'edit'])->name('formulir.edit');
    Route::put('/admin/formulir/{id}', [AdminFormulirController::class, 'update'])->name('formulir.update');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    // Routes for Mahasiswa Formulir
    Route::get('formulir-mahasiswa', [MahasiswaFormulirController::class, 'index'])->name('formulir-mahasiswa.index');
    Route::get('formulir-mahasiswa/create', [MahasiswaFormulirController::class, 'create'])->name('formulir-mahasiswa.create');
    Route::post('formulir-mahasiswa', [MahasiswaFormulirController::class, 'store'])->name('formulir-mahasiswa.store');
    Route::get('formulir-mahasiswa/{id}/edit', [MahasiswaFormulirController::class, 'edit'])->name('formulir-mahasiswa.edit');
    Route::put('formulir-mahasiswa/{id}', [MahasiswaFormulirController::class, 'update'])->name('formulir-mahasiswa.update');
    Route::delete('formulir-mahasiswa/{id}', [MahasiswaFormulirController::class, 'destroy'])->name('formulir-mahasiswa.destroy');
    Route::get('formulir-mahasiswa/print/{id}', [MahasiswaFormulirController::class, 'print'])->name('formulir-mahasiswa.print');
    Route::get('/formulir/print/{id}', [MahasiswaFormulirController::class, 'print'])->name('formulir.print');
    Route::get('formulir-mahasiswa/review/{id}', [MahasiswaFormulirController::class, 'review'])->name('formulir-mahasiswa.review');
    Route::get('/get-cities/{provinceCode}', [MahasiswaFormulirController::class, 'getCities']);
});



require __DIR__ . '/auth.php';
