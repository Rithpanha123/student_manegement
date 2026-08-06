<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content-col">
    <header class="navbar">
      <button class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
        <i class="fas fa-bars"></i>
      </button>

      <div class="page-title">
        <span class="en">wellcome</span>
        <span class="km">ផ្ទាំងគ្រប់គ្រង កាលវិភាគសិក្សា</span>
      </div>

      <div class="navbar-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="ស្វែងរក...">
      </div>

      <button class="icon-btn">
        <i class="fas fa-bell"></i>
        <span class="dot"></span>
      </button>

      <div class="navbar-divider"></div>
      @php
         $user = auth()->user();
      @endphp
      <!-- <button class="user-menu">
        <span class="user-avatar">SD</span>
        <span class="user-info">
          <span class="user-name">Sok Dara</span>
          <span class="user-role">Student · Year 3</span>
        </span>
        <i class="fas fa-chevron-down user-caret"></i>
      </button> -->
      <button class="user-menu">
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
  </div>
</div>
</body>
</html>