<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic counts
        $totalUsers    = User::count();
        $activeUsers   = User::where('is_active', true)->count();
        $inactiveUsers = User::where('is_active', false)->count();

        // New users this month
        $newThisMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Breakdown by role (uses the same $user->role relation already used in UserController)
        $usersByRole = User::with('role')
            ->get()
            ->groupBy(fn ($user) => $user->role->role_name ?? 'N/A')
            ->map->count();

        // 5 most recently created users
        $recentUsers = User::with(['role', 'gender'])
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('dashboard.home', compact(
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'newThisMonth',
            'usersByRole',
            'recentUsers'
        ));
    }
}