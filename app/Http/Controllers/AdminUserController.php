<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    public function approve($id)
{
    $user = User::findOrFail($id);
    $user->role = 'mahasiswa'; // Mengubah role menjadi 'mahasiswa'
    $user->save();

    return redirect()->route('users.index')->with('success', 'User approved successfully.');
}
}
