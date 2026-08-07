<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome 6 (free) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Tailwind CSS (CDN build) -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                keyframes: {
                    fadeUp: {
                        '0%': { opacity: 0, transform: 'translateY(10px)' },
                        '100%': { opacity: 1, transform: 'translateY(0)' },
                    },
                    popIn: {
                        '0%': { opacity: 0, transform: 'scale(0.9)' },
                        '100%': { opacity: 1, transform: 'scale(1)' },
                    },
                },
                animation: {
                    'fade-up': 'fadeUp 0.45s ease-out both',
                    'pop-in': 'popIn 0.4s ease-out both',
                },
            },
        },
    };
</script>
<!-- Google Font (Inter) as latin fallback -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
<style>
    @font-face {
        font-family: 'Kh Battambang';
        src: url('{{ asset('fonts/Kh-Battambang.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    * { font-family: 'Kh Battambang', 'Inter', sans-serif; }
    body { background-color: #f8fafc; }
    ::-webkit-scrollbar { height: 8px; width: 8px; }
    ::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 9999px; }

    @media (prefers-reduced-motion: reduce) {
        * { animation: none !important; transition: none !important; }
    }
</style>

@extends('dashboard.index')

@section('title', 'user_list')

@section('content')

<div class="">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 animate-fade-up">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Users</h1>
            <p class="text-sm text-slate-500 mt-1">Manage accounts, roles, and access.</p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.users.index') }}" class="relative">
                <i class="fas fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs transition-colors peer-focus:text-slate-600"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users…"
                       class="peer pl-9 pr-3 py-2 text-sm bg-white border border-slate-200 rounded-lg w-56 placeholder:text-slate-400 outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 focus:w-64">
            </form>
            <button class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 active:scale-95 hover:-translate-y-0.5 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                <i class="fas fa-plus text-xs"></i>
                Add user
            </button>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden animate-fade-up" style="animation-delay: 80ms">

        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-200">
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">User</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Email</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Gender</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Role</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Status</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Last login</th>
                            <th class="px-6 py-3 text-left font-medium text-slate-500 text-xs uppercase tracking-wide">Created</th>
                            <th class="px-6 py-3 text-right font-medium text-slate-500 text-xs uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $index => $user)
                            <tr class="animate-fade-up hover:bg-slate-50 transition-colors duration-150"
                                style="animation-delay: {{ 80 + min($index, 12) * 40 }}ms">
                                <!-- User (avatar + name + id) -->
                                <td class="px-6 py-3.5 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-900 text-white text-xs font-semibold flex items-center justify-center shrink-0 transition-transform duration-150 hover:scale-110">
                                            @if($user && $user->profile_picture)
                                                <img src="{{ asset('storage/' . $user->profile_picture) }}" 
                                                    alt="{{ $user->username }}"
                                                    class="user-avatar"
                                                    width="40" height="40">
                                            @else
                                                <span class="user-avatar">
                                                    {{ $user ? strtoupper(substr($user->username, 0, 2)) : 'GU' }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-medium text-slate-900 truncate">{{ $user->username }}</p>
                                            <p class="text-xs text-slate-400">ID {{ $user->user_id }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Email -->
                                <td class="px-6 py-3.5 whitespace-nowrap">
                                    <a href="mailto:{{ $user->email }}" class="text-slate-600 hover:text-slate-900 hover:underline transition-colors">
                                        {{ $user->email }}
                                    </a>
                                </td>

                                <!-- Gender -->
                                <td class="px-6 py-3.5 whitespace-nowrap text-slate-600">
                                    {{ $user->gender->gender_name ?? '—' }}
                                </td>

                                <!-- Role -->
                                <td class="px-6 py-3.5 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-indigo-50 text-indigo-700 ring-1 ring-inset ring-indigo-100">
                                        {{ $user->role->role_name ?? 'N/A' }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-3.5 whitespace-nowrap">
                                    @if($user->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-rose-50 text-rose-700 ring-1 ring-inset ring-rose-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Last login -->
                                <td class="px-6 py-3.5 whitespace-nowrap text-slate-500">
                                    @if($user->last_login)
                                        {{ \Carbon\Carbon::parse($user->last_login)->format('d/m/Y H:i') }}
                                    @else
                                        <span class="text-slate-300">Never</span>
                                    @endif
                                </td>

                                <!-- Created -->
                                <td class="px-6 py-3.5 whitespace-nowrap text-slate-500">
                                    {{ $user->created_at ? $user->created_at->format('d/m/Y') : '—' }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-3.5 whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="#" title="View"
                                           class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-slate-700 hover:bg-slate-100 hover:scale-110 active:scale-95 transition-all duration-150">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->user_id) }}" title="Edit"
                                           class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-amber-600 hover:bg-amber-50 hover:scale-110 active:scale-95 transition-all duration-150">
                                            <i class="fas fa-pen text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                    class="delete-btn w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 hover:scale-110 active:scale-95 transition-all duration-150">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer with Pagination Links -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 px-6 py-3.5 border-t border-slate-200 bg-slate-50/60">
                <div class="flex items-center gap-4">
                    <p class="text-xs text-slate-500">
                        Showing <span class="font-medium text-slate-700">{{ $users->firstItem() ?? 0 }}</span>
                        to <span class="font-medium text-slate-700">{{ $users->lastItem() ?? 0 }}</span>
                        of <span class="font-medium text-slate-700">{{ $users->total() }}</span> users
                    </p>

                    <!-- Per-page selector -->
                    <form method="GET" action="{{ route('admin.users.index') }}" class="flex items-center gap-1.5">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        <label for="per_page" class="text-xs text-slate-500">Show</label>
                        <select name="per_page" id="per_page" onchange="this.form.submit()"
                                class="text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-md px-2 py-1 outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 cursor-pointer">
                            <option value="10" @selected($perPage == 10)>10</option>
                            <option value="20" @selected($perPage == 20)>20</option>
                            <option value="30" @selected($perPage == 30)>30</option>
                            <option value="all" @selected($perPage === 'all')>All</option>
                        </select>
                    </form>
                </div>

                <div class="flex items-center gap-1">
                    {{-- Previous Page Link --}}
                    @if ($users->onFirstPage())
                        <span class="px-3 py-1.5 text-xs text-slate-400 bg-slate-100 border border-slate-200 rounded-md cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}"
                           class="px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-md hover:bg-slate-50 hover:border-slate-300 transition-colors">
                            Previous
                        </a>
                    @endif

                    {{-- Page Number Links --}}
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <span class="px-3 py-1.5 text-xs font-semibold text-white bg-slate-900 rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-md hover:bg-slate-50 hover:border-slate-300 transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}"
                           class="px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-md hover:bg-slate-50 hover:border-slate-300 transition-colors">
                            Next
                        </a>
                    @else
                        <span class="px-3 py-1.5 text-xs text-slate-400 bg-slate-100 border border-slate-200 rounded-md cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        @else
            <!-- Empty state -->
            <div class="flex flex-col items-center justify-center text-center py-20 px-6">
                <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center mb-4 animate-pop-in">
                    <i class="fas fa-users text-slate-400 text-lg"></i>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 animate-fade-up" style="animation-delay: 100ms">No users yet</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-xs animate-fade-up" style="animation-delay: 150ms">New accounts you add will show up here.</p>
                <button class="mt-5 inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 active:scale-95 hover:-translate-y-0.5 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 animate-fade-up" style="animation-delay: 200ms">
                    <i class="fas fa-plus text-xs"></i>
                    Add user
                </button>
            </div>
        @endif
    </div>

</div>

<script>
    // Confirm delete with a quick fade-out on the row before submitting
    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure you want to delete this user?')) return;

            var row = form.closest('tr');
            if (row) {
                row.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                row.style.opacity = '0';
                row.style.transform = 'translateX(8px)';
                setTimeout(function () { form.submit(); }, 220);
            } else {
                form.submit();
            }
        });
    });
</script>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'ជោគជ័យ!',
                text: @json(session('success')),
                confirmButtonText: 'យល់ព្រម',
                confirmButtonColor: '#0f172a',
                timer: 2500,
                timerProgressBar: true,
            });
        });
    </script>
@endif
@endsection