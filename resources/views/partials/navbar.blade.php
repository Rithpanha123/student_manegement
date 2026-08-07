<script src="https://cdn.tailwindcss.com"></script>
<header class="navbar">
    <button class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
    </button>

    <div class="page-title">
        <span class="en">Welcome</span>
        <span class="km">ផ្ទាំងគ្រប់គ្រង កាលវិភាគសិក្សា</span>
    </div>

    <div class="navbar-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="ស្វែងរក...">
    </div>

    <button class="relative p-2 rounded-full hover:bg-gray-100">
    <i class="fas fa-bell text-xl"></i>

    <!-- Notification Badge -->
    <span
        class="absolute -top-1 -right-2 min-w-5 h-5 px-1 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center border-2 border-white">
        100
    </span>
</button>

    <div class="navbar-divider"></div>

    

    @php
    $user = auth()->user();
@endphp

<button class="user-menu" onclick="toggleUserDropdown()">
    <!-- Avatar -->
    @if($user && $user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" 
             alt="{{ $user->username }}"
             class="user-avatar-img"
             width="40" height="40">
    @else
        <span class="user-avatar">
            {{ $user ? strtoupper(substr($user->username, 0, 2)) : 'GU' }}
        </span>
    @endif
    
    <span class="user-info">
        <span class="user-name">{{ $user ? $user->username : 'Guest' }}</span>
        <span class="user-role">
            @if($user && $user->role)
                {{ $user->role->role_name }}
            @else
                User
            @endif
        </span>
    </span>
    <i class="fas fa-chevron-down user-caret"></i>
</button>
</header>