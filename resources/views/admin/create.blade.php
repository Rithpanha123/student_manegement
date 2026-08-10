

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
                    <input type="file" name="profile_picture" accept="image/*"
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
                    <div class="relative">
                        <input type="password" name="password" id="password" oninput="checkPasswordStrength(this.value)"
                               class="w-full px-3 py-2 pr-10 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                        <button type="button" onclick="togglePassword('password', this)"
                                class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="fas fa-eye-slash text-xs"></i>
                        </button>
                    </div>

                    <!-- Strength bar -->
                    <div class="mt-2">
                        <div class="flex gap-1 h-1.5">
                            <div id="bar-1" class="flex-1 rounded-full bg-slate-200 transition-colors duration-200"></div>
                            <div id="bar-2" class="flex-1 rounded-full bg-slate-200 transition-colors duration-200"></div>
                            <div id="bar-3" class="flex-1 rounded-full bg-slate-200 transition-colors duration-200"></div>
                            <div id="bar-4" class="flex-1 rounded-full bg-slate-200 transition-colors duration-200"></div>
                        </div>
                        <p id="strength-text" class="text-xs mt-1 text-slate-400">ត្រូវការយ៉ាងហោចណាស់ 8 តួអក្សរ</p>
                        <ul id="strength-checklist" class="mt-1.5 grid grid-cols-2 gap-x-3 gap-y-0.5 text-[11px] text-slate-400">
                            <li id="chk-length"><i class="fas fa-circle text-[5px] align-middle mr-1"></i>8+ តួអក្សរ</li>
                            <li id="chk-upper"><i class="fas fa-circle text-[5px] align-middle mr-1"></i>អក្សរធំ (A-Z)</li>
                            <li id="chk-lower"><i class="fas fa-circle text-[5px] align-middle mr-1"></i>អក្សរតូច (a-z)</li>
                            <li id="chk-number"><i class="fas fa-circle text-[5px] align-middle mr-1"></i>លេខ (0-9)</li>
                            <li id="chk-symbol"><i class="fas fa-circle text-[5px] align-middle mr-1"></i>និមិត្តសញ្ញា (!@#$...)</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirm password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="w-full px-3 py-2 pr-10 text-sm bg-white border border-slate-200 rounded-lg outline-none transition-all duration-150 focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300">
                        <button type="button" onclick="togglePassword('password_confirmation', this)"
                                class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="fas fa-eye-slash text-xs"></i>
                        </button>
                    </div>
                    <p id="match-text" class="text-xs mt-1 text-slate-400">ត្រូវតែផ្គូផ្គងគ្នាជាមួយ password ខាងលើ</p>
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
                <button type="submit" id="submit-btn"
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
{{-- close eye and open eye icons --}}
<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    }
}

function checkPasswordStrength(value) {
    const checks = {
        length: value.length >= 8,
        upper: /[A-Z]/.test(value),
        lower: /[a-z]/.test(value),
        number: /[0-9]/.test(value),
        symbol: /[^A-Za-z0-9]/.test(value),
    };

    Object.keys(checks).forEach(key => {
        const el = document.getElementById('chk-' + key);
        const icon = el.querySelector('i');
        if (checks[key]) {
            el.classList.remove('text-slate-400');
            el.classList.add('text-emerald-600');
            icon.classList.replace('fa-circle', 'fa-circle-check');
            icon.classList.remove('text-[5px]');
        } else {
            el.classList.remove('text-emerald-600');
            el.classList.add('text-slate-400');
            icon.classList.replace('fa-circle-check', 'fa-circle');
            icon.classList.add('text-[5px]');
        }
    });

    const score = Object.values(checks).filter(Boolean).length; // 0-5
    const bars = [
        document.getElementById('bar-1'),
        document.getElementById('bar-2'),
        document.getElementById('bar-3'),
        document.getElementById('bar-4'),
    ];
    const text = document.getElementById('strength-text');

    bars.forEach(b => b.className = 'flex-1 rounded-full bg-slate-200 transition-colors duration-200');

    if (value.length === 0) {
        text.textContent = 'ត្រូវការយ៉ាងហោចណាស់ 8 តួអក្សរ';
        text.className = 'text-xs mt-1 text-slate-400';
        checkPasswordMatch();
        return;
    }

    let level = 0;
    let color = 'bg-red-500';
    let label = 'ខ្សោយ (Weak)';
    let labelColor = 'text-red-500';

    if (score <= 2) {
        level = 1; color = 'bg-red-500'; label = 'ខ្សោយ (Weak)'; labelColor = 'text-red-500';
    } else if (score === 3) {
        level = 2; color = 'bg-amber-500'; label = 'មធ្យម (Medium)'; labelColor = 'text-amber-500';
    } else if (score === 4) {
        level = 3; color = 'bg-blue-500'; label = 'ល្អ (Good)'; labelColor = 'text-blue-500';
    } else if (score === 5) {
        level = 4; color = 'bg-emerald-500'; label = 'ខ្លាំង (Strong)'; labelColor = 'text-emerald-500';
    }

    for (let i = 0; i < level; i++) {
        bars[i].className = 'flex-1 rounded-full ' + color + ' transition-colors duration-200';
    }

    text.textContent = label;
    text.className = 'text-xs mt-1 font-medium ' + labelColor;

    checkPasswordMatch();
}

function checkPasswordMatch() {
    const pw = document.getElementById('password').value;
    const confirm = document.getElementById('password_confirmation').value;
    const matchText = document.getElementById('match-text');

    if (confirm.length === 0) {
        matchText.textContent = 'ត្រូវតែផ្គូផ្គងគ្នាជាមួយ password ខាងលើ';
        matchText.className = 'text-xs mt-1 text-slate-400';
        return;
    }

    if (pw === confirm) {
        matchText.textContent = 'Password ត្រូវគ្នា ✓';
        matchText.className = 'text-xs mt-1 text-emerald-600 font-medium';
    } else {
        matchText.textContent = 'Password មិនត្រូវគ្នាទេ ✗';
        matchText.className = 'text-xs mt-1 text-red-500 font-medium';
    }
}

document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
</script>
@endsection