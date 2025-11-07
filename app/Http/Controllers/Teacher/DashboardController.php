<?php

namespace App\Http\Controllers\Teacher;

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
        $this->middleware(['auth', 'role:Teacher']);
    }

    /**
     * Show the teacher dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Get teacher-specific statistics
        // This will be expanded when we implement specific modules
        $recentActivities = [];
        $upcomingClasses = [];
        $pendingTasks = [];

        return view('teacher.dashboard', compact(
            'user',
            'recentActivities',
            'upcomingClasses',
            'pendingTasks'
        ));
    }
}