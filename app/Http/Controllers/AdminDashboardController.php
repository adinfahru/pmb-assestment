<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        // Pass the data to the view
        return view('admin.dashboard.index', compact( 'users'));
    }
}
