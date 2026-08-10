@extends('dashboard.index')

@section('title', 'dashboard')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap');

    .font-display { font-family: 'Fraunces', 'Kh Battambang', serif; font-optical-sizing: auto; }

    .seal-ring {
        stroke-dasharray: 4 6;
        animation: spin 40s linear infinite;
        transform-origin: center;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    .stat-card { position: relative; overflow: hidden; }
    .stat-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--accent-color, #16213E);
    }

    .timeline-item { position: relative; }
    .timeline-item::before {
        content: '';
        position: absolute; left: 15px; top: 34px; bottom: -14px; width: 1px;
        background: #e2e8f0;
    }
    .timeline-item:last-child::before { display: none; }

    @media (prefers-reduced-motion: reduce) {
        .seal-ring { animation: none; }
    }
</style>

<div class="max-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <!-- Hero banner -->
    <div class="relative overflow-hidden rounded-2xl mb-8 animate-fade-up"
         style="background: linear-gradient(135deg, #320708 0%, #4E0C0E 55%,#661216 100%);">

        <!-- Decorative seal motif -->
        <svg class="absolute -right-6 -top-10 w-45 h-56 opacity-[0.18] hidden sm:block " viewBox="0 0 200 200" fill="none">
            <circle class="seal-ring" cx="100" cy="100" r="90" stroke="#D8A72C" stroke-width="2"/>
            <circle cx="100" cy="100" r="68" stroke="#D8A72C" stroke-width="1"/>
            <circle cx="100" cy="100" r="10" fill="#D8A72C"/>
        </svg>
        <svg class="absolute -right-6 -top-50 w-45 h-45 opacity-[0.18] hidden sm:block" viewBox="0 0 200 200" fill="none">
            <circle class="seal-ring" cx="100" cy="100" r="90" stroke="#D8A72C" stroke-width="1"/>
            <circle cx="100" cy="100" r="68" stroke="#D8A72C" stroke-width="2"/>
            <circle cx="100" cy="100" r="10" fill="#D8A72C"/>
        </svg>

        <div class="relative px-7 py-8 sm:px-10 sm:py-10">
            <p class="text-xs font-medium tracking-widest uppercase text-[#D8A93A] mb-2">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
            <h1 class="font-display text-3xl sm:text-4xl font-semibold text-white tracking-tight">
                Welcome back{{ auth()->user()->username ? ', ' . auth()->user()->username : '' }}
            </h1>
            <p class="text-sm text-slate-300 mt-2 max-w-md">
                Here's how your user accounts are looking today.
            </p>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <!-- Total Users -->
        <div class="stat-card bg-white border border-slate-200 rounded-2xl shadow-sm p-5 animate-fade-up hover:-translate-y-1 hover:shadow-lg transition-all duration-300"
             style="--accent-color:#16213E; animation-delay: 0ms">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-medium text-slate-500 uppercase tracking-wide">Total users</span>
                <div class="w-9 h-9 rounded-lg flex items-center justify-center animate-pop-in" style="background:#16213E14" style="animation-delay: 300ms">
                    <i class="fas fa-users text-sm" style="color:#16213E"></i>
                </div>
            </div>
            <p class="font-display text-4xl font-semibold text-slate-900 counter" data-target="{{ $totalUsers }}">0</p>
        </div>

        <!-- Active Users -->
        <div class="stat-card bg-white border border-slate-200 rounded-2xl shadow-sm p-5 animate-fade-up hover:-translate-y-1 hover:shadow-lg transition-all duration-300"
             style="--accent-color:#2F8F86; animation-delay: 60ms">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-medium text-slate-500 uppercase tracking-wide">Active</span>
                <div class="w-9 h-9 rounded-lg bg-[#2F8F8614] flex items-center justify-center animate-pop-in" style="animation-delay: 360ms">
                    <i class="fas fa-circle-check text-sm" style="color:#2F8F86"></i>
                </div>
            </div>
            <p class="font-display text-4xl font-semibold text-slate-900 counter" data-target="{{ $activeUsers }}">0</p>
        </div>

        <!-- Inactive Users -->
        <div class="stat-card bg-white border border-slate-200 rounded-2xl shadow-sm p-5 animate-fade-up hover:-translate-y-1 hover:shadow-lg transition-all duration-300"
             style="--accent-color:#C1554A; animation-delay: 120ms">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-medium text-slate-500 uppercase tracking-wide">Inactive</span>
                <div class="w-9 h-9 rounded-lg bg-[#C1554A14] flex items-center justify-center animate-pop-in" style="animation-delay: 420ms">
                    <i class="fas fa-circle-xmark text-sm" style="color:#C1554A"></i>
                </div>
            </div>
            <p class="font-display text-4xl font-semibold text-slate-900 counter" data-target="{{ $inactiveUsers }}">0</p>
        </div>

        <!-- New This Month -->
        <div class="stat-card bg-white border border-slate-200 rounded-2xl shadow-sm p-5 animate-fade-up hover:-translate-y-1 hover:shadow-lg transition-all duration-300"
             style="--accent-color:#D8A93A; animation-delay: 180ms">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-medium text-slate-500 uppercase tracking-wide">New this month</span>
                <div class="w-9 h-9 rounded-lg bg-[#D8A93A1A] flex items-center justify-center animate-pop-in" style="animation-delay: 480ms">
                    <i class="fas fa-user-plus text-sm" style="color:#B8860B"></i>
                </div>
            </div>
            <p class="font-display text-4xl font-semibold text-slate-900 counter" data-target="{{ $newThisMonth }}">0</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Role Breakdown -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 animate-fade-up" style="animation-delay: 220ms">
            <h2 class="text-sm font-semibold text-slate-900 mb-5">Users by role</h2>

            @php
                $palette = ['#16213E', '#D8A93A', '#2F8F86', '#C1554A', '#7C6FC9', '#3B82C4'];
            @endphp

            @if($usersByRole->count() > 0)
                <div class="space-y-4">
                    @foreach($usersByRole as $roleName => $count)
                        @php
                            $percent = $totalUsers > 0 ? round(($count / $totalUsers) * 100) : 0;
                            $color = $palette[$loop->index % count($palette)];
                        @endphp
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="flex items-center gap-2 text-xs font-medium text-slate-700">
                                    <span class="w-2 h-2 rounded-full" style="background:{{ $color }}"></span>
                                    {{ $roleName }}
                                </span>
                                <span class="text-xs text-slate-400">{{ $count }} · {{ $percent }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="progress-bar h-full rounded-full transition-all duration-700 ease-out"
                                     style="width: 0%; background: {{ $color }}" data-width="{{ $percent }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-slate-400">No data yet.</p>
            @endif
        </div>

        <!-- Recent Users (timeline) -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden lg:col-span-2 animate-fade-up" style="animation-delay: 260ms">
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
                <h2 class="text-sm font-semibold text-slate-900">Recently added users</h2>
                <a href="{{ route('admin.users.index') }}" class="text-xs font-medium text-slate-500 hover:text-slate-900 transition-colors">
                    View all <i class="fas fa-arrow-right text-[10px] ml-0.5"></i>
                </a>
            </div>

            @if($recentUsers->count() > 0)
                <div class="px-6 py-5">
                    @foreach($recentUsers as $index => $user)
                        <div class="timeline-item flex items-start gap-4 pb-5 animate-fade-up" style="animation-delay: {{ 280 + $index * 40 }}ms">
                            <div class="relative shrink-0">
                                <div class="w-8 h-8 rounded-full text-white text-xs font-semibold flex items-center justify-center transition-transform duration-150 hover:scale-110"
                                     style="background: {{ $user->is_active ? '#2F8F86' : '#94a3b8' }}">
                                    {{ strtoupper(substr($user->username, 0, 1)) }}
                                </div>
                            </div>

                            <div class="flex-1 min-w-0 flex items-center justify-between gap-3">
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-slate-900 truncate">{{ $user->username }}</p>
                                    <p class="text-xs text-slate-400 truncate">{{ $user->email }}</p>
                                </div>

                                <div class="flex items-center gap-2 shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-indigo-50 text-indigo-700 ring-1 ring-inset ring-indigo-100">
                                        {{ $user->role->role_name ?? 'N/A' }}
                                    </span>
                                    <span class="text-xs text-slate-400 w-16 text-right">
                                        {{ $user->created_at ? $user->created_at->format('d/m/Y') : '—' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center text-center py-16 px-6">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mb-3">
                        <i class="fas fa-users text-slate-400"></i>
                    </div>
                    <p class="text-sm text-slate-500">No users yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Count-up animation for stat card numbers
    document.querySelectorAll('.counter').forEach(function (el) {
        var target = parseInt(el.getAttribute('data-target'), 10) || 0;
        var duration = 900;
        var startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.floor(eased * target);
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = target;
            }
        }
        requestAnimationFrame(step);
    });

    // Animate role breakdown progress bars from 0 to their target width
    requestAnimationFrame(function () {
        setTimeout(function () {
            document.querySelectorAll('.progress-bar').forEach(function (bar) {
                var width = bar.getAttribute('data-width') || 0;
                bar.style.width = width + '%';
            });
        }, 250);
    });
</script>
@endsection