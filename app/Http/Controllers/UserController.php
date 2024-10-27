<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->role = 'mahasiswa'; // Atau role lain sesuai kebutuhan, misalnya 'approved_mahasiswa'
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil disetujui.');
    }
}
