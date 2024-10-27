<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MahasiswaDashboardController;


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
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
});



require __DIR__ . '/auth.php';
