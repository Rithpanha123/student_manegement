<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
            <a href="{{ route('admin.user_list')}}" class="dropdown-item"><i class="fas fa-plus-circle dropdown-icon"></i><span>បង្កើតថ្នាក់</span></a>
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
        <a class="nav-link menu-item" data-delay="11" href="#">
          <i class="fas fa-sign-out-alt"></i>
          <span>Sign out</span>
        </a>
      </div>
      
    </nav>

   
  </aside>
</body>
</html>