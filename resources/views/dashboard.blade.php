<!DOCTYPE html>
<html lang="km">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ផ្ទាំងគ្រប់គ្រង — Bour Kry University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Noto+Serif+Khmer:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="app">

  <!-- ================= SIDEBAR ================= -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-logo">
        <img src="assets/logo.png" alt="University seal" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="brand-logo-fallback"><i class="fas fa-university"></i></div>
      </div>
      <div class="brand-text">
        <div class="brand-en">Bour Kry University</div>
        <div class="brand-km">សម្ដេចព្រះមហាសង្ឃរាជ ប៊ួរគ្រី</div>
      </div>
    </div>

    <nav class="nav-scroll">
      <div class="nav-group">
        <div class="nav-group-label">Main</div>

        <a class="nav-link  menu-item" data-delay="1" href="#"> <!-- active -->
          <i class="fas fa-th-large"></i>
          <span>Dashboard</span>
        </a>

        <a class="nav-link menu-item" data-delay="2" href="#">
          <i class="fas fa-file-alt"></i>
          <span>របាយការណ៏</span>
        </a>

        <!-- Class dropdown -->
        <div class="nav-dropdown menu-item" data-delay="3">
          <a class="nav-link nav-toggle" href="#" data-target="Class-dropdown">
            <i class="fas fa-chalkboard"></i>
            <span>ថ្នាក់រៀន</span>
            <span class="nav-badge">new</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="Class-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-plus-circle dropdown-icon"></i><span>បង្កើតថ្នាក់</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-list dropdown-icon"></i><span>ថ្នាក់ទាំងអស់</span></a>
          </div>
        </div>

        <!-- Student dropdown -->
        <div class="nav-dropdown menu-item" data-delay="4">
          <a class="nav-link nav-toggle" href="#" data-target="Student-dropdown">
            <i class="fas fa-user-graduate"></i>
            <span>សិស្ស</span>
            <span class="nav-badge">new</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="Student-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-user-plus dropdown-icon"></i><span>បញ្ចូលឈ្មោះសិស្សថ្មី</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-users dropdown-icon"></i><span>បញ្ជីសិស្សរួម</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-user-times dropdown-icon"></i><span>បញ្ចីសិស្សឈប់</span></a>
          </div>
        </div>

        <!-- Staff dropdown -->
        <div class="nav-dropdown menu-item" data-delay="5">
          <a class="nav-link nav-toggle" href="#" data-target="Staff-dropdown">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>បុគ្គលិក</span>
            <span class="nav-badge">new</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="Staff-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-users dropdown-icon"></i><span>បញ្ជីសិស្សរួម</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-calendar-alt dropdown-icon"></i><span>បញ្ជីតាមឆ្នាំសិក្សា</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-user-slash dropdown-icon"></i><span>បញ្ចីសិស្សឈប់</span></a>
          </div>
        </div>

        <!-- Invoice dropdown -->
        <div class="nav-dropdown menu-item" data-delay="6">
          <a class="nav-link nav-toggle" href="#" data-target="invoice-dropdown">
            <i class="fas fa-receipt"></i>
            <span>វិក័យបត្រ</span>
            <span class="nav-badge">new</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="invoice-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-plus-circle dropdown-icon"></i><span>បង្កើតវិក័យបត្រ</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-list dropdown-icon"></i><span>វិក័យបត្រទាំងអស់</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-exclamation-triangle dropdown-icon"></i><span>វិក័យបត្រជំពាក់</span></a>
          </div>
        </div>

        <!-- Bill dropdown -->
        <div class="nav-dropdown menu-item" data-delay="7">
          <a class="nav-link nav-toggle" href="#" data-target="bill-dropdown">
            <i class="fas fa-file-invoice"></i>
            <span>Bill</span>
            <span class="nav-badge">new</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="bill-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-list-ul dropdown-icon"></i><span>List Bill</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-file-invoice dropdown-icon"></i><span>List All invoice</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-trash-alt dropdown-icon"></i><span>វិក័យបត្រស្នើរកាលុប</span></a>
          </div>
        </div>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Shipping</div>

        <div class="nav-dropdown menu-item" data-delay="8">
          <a class="nav-link nav-toggle" href="#" data-target="transport-dropdown">
            <i class="fas fa-truck"></i>
            <span>ខ្សែដឹកជញ្ជូន</span>
            <span class="nav-badge">3</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="transport-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-plus dropdown-icon"></i><span>បញ្ចូលខ្សែដឹកជញ្ជូនថ្មី</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-list dropdown-icon"></i><span>បញ្ចីខ្សែដឹកជញ្ជូន</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-calendar dropdown-icon"></i><span>បញ្ចីតាមឆ្នាំ</span></a>
          </div>
        </div>

        <div class="nav-dropdown menu-item" data-delay="9">
          <a class="nav-link nav-toggle" href="#" data-target="bus-dropdown">
            <i class="fas fa-bus"></i>
            <span>ឡាន</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="bus-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-plus-circle dropdown-icon"></i><span>បញ្ចូលឡានថ្មី</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-plus-circle dropdown-icon"></i><span>បញ្ចូលរម៉កថ្មី</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-list-alt dropdown-icon"></i><span>បញ្ចីឡានតាមឆ្នាំសិក្សា</span></a>
          </div>
        </div>
      </div>

      <div class="nav-group">
        <div class="nav-group-label">Account</div>

        <!-- <div class="nav-dropdown menu-item" data-delay="10">
          <a class="nav-link nav-toggle" href="#" data-target="account-dropdown">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
            <span class="dropdown-arrow"><i class="fas fa-chevron-down"></i></span>
          </a>
          <div class="dropdown-content" id="account-dropdown">
            <a href="#" class="dropdown-item"><i class="fas fa-user dropdown-icon"></i><span>Profile</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-lock dropdown-icon"></i><span>Security</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-palette dropdown-icon"></i><span>Appearance</span></a>
            <a href="#" class="dropdown-item"><i class="fas fa-bell dropdown-icon"></i><span>Notifications</span></a>
          </div>
        </div> -->

        <a class="nav-link menu-item" data-delay="11" href="#">
          <i class="fas fa-sign-out-alt"></i>
          <span>Sign out</span>
        </a>
      </div>
      
    </nav>

   
  </aside>

  <!-- ================= NAVBAR + MAIN ================= -->
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

      <button class="user-menu">
        <span class="user-avatar">SD</span>
        <span class="user-info">
          <span class="user-name">Sok Dara</span>
          <span class="user-role">Student · Year 3</span>
        </span>
        <i class="fas fa-chevron-down user-caret"></i>
      </button>
    </header>

    <main class="main">
      <div class="stat-grid">
        <div class="stat-card">
          <div class="label">Courses</div>
          <div class="value">7</div>
          <div class="delta">+1 this term</div>
        </div>
        <div class="stat-card">
          <div class="label">Attendance</div>
          <div class="value">96%</div>
          <div class="delta">+2% this month</div>
        </div>
        <div class="stat-card">
          <div class="label">GPA</div>
          <div class="value">3.7</div>
          <div class="delta">stable</div>
        </div>
        <div class="stat-card">
          <div class="label">Pending Bills</div>
          <div class="value">1</div>
          <div class="delta">due Aug 20</div>
        </div>
      </div>

      <div class="schedule-card">
        <div class="card-head">
          <h2>This Week</h2>
          <span class="sub">Aug 4 – Aug 8, 2026</span>
        </div>
        <div class="placeholder-card">
          <i class="fas fa-calendar-week" style="font-size:1.6rem; margin-bottom:8px; display:block;"></i>
          Timetable content goes here
        </div>
      </div>
    </main>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
