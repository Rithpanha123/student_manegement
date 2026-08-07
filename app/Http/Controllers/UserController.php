<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['gender', 'role'])->get();

        return view('admin.user_list', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $genders = Gender::all();

        return view('admin.create', compact('roles', 'genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'        => 'required|string|max:255|unique:users,username',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|string|min:6|confirmed',
            'role_id'         => 'required|exists:roles,role_id',
            'is_active'       => 'nullable|boolean',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        User::create([
            'username'        => $validated['username'],
            'email'           => $validated['email'],
            'password_hash'   => Hash::make($validated['password']),
            'role_id'         => $validated['role_id'],
            'is_active'       => $request->boolean('is_active'),
            'last_login'      => null,
            'profile_picture' => $path,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $genders = Gender::all();

        return view('admin.user_edit', compact('user', 'roles', 'genders'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'        => 'required|string|max:255|unique:users,username,' . $user->user_id . ',user_id',
            'email'           => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'password'        => 'nullable|string|min:6|confirmed',
            'role_id'         => 'required|exists:roles,role_id',
            'is_active'       => 'nullable|boolean',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = [
            'username'  => $validated['username'],
            'email'     => $validated['email'],
            'role_id'   => $validated['role_id'],
            'is_active' => $request->boolean('is_active'),
        ];

        if (!empty($validated['password'])) {
            $data['password_hash'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}