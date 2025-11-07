<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Get dashboard statistics
        $totalUsers = User::count();
        $totalTeachers = User::role('Teacher')->count();
        $totalStudents = User::role('Student')->count();
        $totalParents = User::role('Parent')->count();

        return view('admin.dashboard', compact(
            'user',
            'totalUsers',
            'totalTeachers',
            'totalStudents',
            'totalParents'
        ));
    }
}