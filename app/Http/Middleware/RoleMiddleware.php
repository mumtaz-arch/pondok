<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Check if user has any of the required roles
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // If user doesn't have any of the required roles, redirect to their appropriate dashboard
        return redirect()->route($this->getUserDashboardRoute($user));
    }

    /**
     * Get the appropriate dashboard route for the user based on their role
     */
    private function getUserDashboardRoute($user): string
    {
        if ($user->hasRole('Admin')) {
            return 'admin.dashboard';
        } elseif ($user->hasRole('Teacher')) {
            return 'teacher.dashboard';
        } elseif ($user->hasRole('Student')) {
            return 'student.dashboard';
        } elseif ($user->hasRole('Parent')) {
            return 'parent.dashboard';
        }

        return 'login';
    }
}