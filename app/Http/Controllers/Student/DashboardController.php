<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:Student']);
    }

    /**
     * Show the student dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Get student-specific data
        // This will be expanded when we implement specific modules
        $availableTests = [];
        $recentResults = [];
        $attendanceStats = [];

        return view('student.dashboard', compact(
            'user',
            'availableTests',
            'recentResults',
            'attendanceStats'
        ));
    }
}