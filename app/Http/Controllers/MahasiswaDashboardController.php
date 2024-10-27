<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'pending') {
            return view('dashboard'); // Tampilan untuk pengguna yang belum di-approve
        } elseif ($user->role === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard'); // Redirect ke dashboard mahasiswa
        }

        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
