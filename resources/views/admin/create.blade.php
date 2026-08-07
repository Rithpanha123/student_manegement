<!-- Font Awesome 6 (free) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Tailwind CSS (CDN build) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('dashboard.index')

@section('title', 'Create User')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8 animate-fade-up">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Add User</h1>
            <p class="text-sm text-slate-500 mt-1">Create a new account.</p>
        </div>
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-900 text-sm font-medium transition-colors">
            <i class="fas fa-arrow-left text-xs"></i> Back
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8 animate-fade-up" style="animation-delay: 80ms">

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Profile picture -->
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden shrink-0">
                    <i class="fas fa-user text-slate-300 text-2xl"></i>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Profile picture</label>
                    <input type="file" name="profile_picture"
                           class="text-sm text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 transition-all">
                </div>
            </div>

            <!-- Username / Email -->
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                </div>
            </div>

            <!-- Password / Confirm -->
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input type="password" name="password"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirm password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                </div>
            </div>

            <!-- Role / Gender -->
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                    <select name="role_id"
                            class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                        <option value="">-- Select role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->role_id }}" {{ old('role_id') == $role->role_id ? 'selected' : '' }}>
                                {{ $role->role_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Gender</label>
                    <select name="gender_id"
                            class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                        <option value="">-- Select gender --</option>
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}" {{ old('gender_id') == $gender->id ? 'selected' : '' }}>
                                {{ $gender->gender_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Active toggle -->
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" id="is_active" checked
                       class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/20">
                <label for="is_active" class="text-sm font-medium text-slate-700">Active account</label>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}"
                   class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 active:scale-95 hover:-translate-y-0.5 text-white text-sm font-medium px-5 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <i class="fas fa-check text-xs"></i>
                    Save user
                </button>
            </div>
        </form>
    </div>
</div>

{{-- SweetAlert2: បង្ហាញ validation errors ទាំងអស់ជា alert តែមួយ --}}
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'សូមពិនិត្យទិន្នន័យឡើងវិញ',
                html: `<ul style="text-align:left; padding-left: 20px; margin:0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                       </ul>`,
                confirmButtonText: 'យល់ព្រម',
                confirmButtonColor: '#0f172a',
            });
        });
    </script>
@endif

{{-- SweetAlert2: បង្ហាញ success message (ករណី redirect មកទំព័រនេះវិញ) --}}
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