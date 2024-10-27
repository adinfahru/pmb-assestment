<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Periksa apakah pengguna memiliki peran 'pending'
        if ($user->role === 'pending') {
            // Tampilkan tampilan untuk pengguna yang belum di-approve
            return view('dashboard'); // Ganti dengan tampilan untuk pengguna yang belum di-approve
        }

        // Jika pengguna sudah di-approve dan berperan 'mahasiswa', tampilkan dashboard mahasiswa
        if ($user->role === 'mahasiswa') {
            return view('mahasiswa.dashboard.index'); // Tampilkan dashboard mahasiswa
        }

        // Jika tidak ada peran yang sesuai, alihkan ke beranda dengan pesan error
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
