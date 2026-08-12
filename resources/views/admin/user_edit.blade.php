@extends('dashboard.index')
@section('title', 'Edit User')
@section('content')
<div class="max-w-2xl mx-auto">

    <div class="flex items-center justify-between mb-8 animate-fade-up">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Edit User</h1>
            <p class="text-sm text-slate-500 mt-1">Update account details.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-900 text-sm font-medium transition-colors">
            <i class="fas fa-arrow-left text-xs"></i> Back
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8 animate-fade-up" style="animation-delay: 80ms">
        <form action="{{ route('admin.users.update', $user->user_id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Profile picture with live preview -->
            <div class="flex items-center gap-4">
                <div id="avatar-preview" class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden shrink-0">
                    <img id="avatar-img"
                         src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : '' }}"
                         class="w-full h-full object-cover {{ $user->profile_picture ? '' : 'hidden' }}">
                    <i id="avatar-icon" class="fas fa-user text-slate-300 text-2xl {{ $user->profile_picture ? 'hidden' : '' }}"></i>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Profile picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                           onchange="previewImage(this)"
                           class="text-sm text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 transition-all">
                    <p class="text-xs text-slate-400 mt-1">JPG, PNG, WEBP - អតិបរមា 2MB</p>
                    @error('profile_picture') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                    @error('username') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                    @error('email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">New password <span class="text-slate-400 font-normal">(optional)</span></label>
                    <input type="password" name="password"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                    @error('password') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirm password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                    <select name="role_id" class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                        @foreach ($roles as $role)
                            <option value="{{ $role->role_id }}" {{ old('role_id', $user->role_id) == $role->role_id ? 'selected' : '' }}>
                                {{ $role->role_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Gender</label>
                    <select name="gender_id" class="w-full px-3 py-2 text-sm bg-white border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-300 transition-all">
                        <option value="">-- Select gender --</option>
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->gender_id }}" {{ old('gender_id', $user->gender_id) == $gender->gender_id ? 'selected' : '' }}>
                                {{ $gender->gender_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900/20">
                <label for="is_active" class="text-sm font-medium text-slate-700">Active account</label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 active:scale-95 hover:-translate-y-0.5 text-white text-sm font-medium px-5 py-2 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                    <i class="fas fa-check text-xs"></i>
                    Update user
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const img = document.getElementById('avatar-img');
    const icon = document.getElementById('avatar-icon');

    if (input.files && input.files[0]) {
        const file = input.files[0];

        // ឆែក file size (2MB) ក្នុង client-side មុនផ្ញើទៅ server
        if (file.size > 2 * 1024 * 1024) {
            alert('រូបភាពមិនអាចលើសពី 2MB បានទេ');
            input.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            img.src = e.target.result;
            img.classList.remove('hidden');
            icon.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection