<?php

namespace App\Http\Controllers\Parent;

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
        $this->middleware(['auth', 'role:Parent']);
    }

    /**
     * Show the parent dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        // Get parent-specific data
        // This will be expanded when we implement specific modules
        $childrenData = [];
        $recentActivities = [];
        $academicReports = [];

        return view('parent.dashboard', compact(
            'user',
            'childrenData',
            'recentActivities',
            'academicReports'
        ));
    }
}