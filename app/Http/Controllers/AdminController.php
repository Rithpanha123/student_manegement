<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user;
        return view('admin.user_list', compact('users'));
    }

    public function users()
    {
        $users = User::with(['gender', 'role'])->get();
        return view('admin.user_list', compact('users'));
    }

    // public function create()
    // {
    //     //retrieve necessary data for the form, such as roles and genders
    //     $genders = Gender::all();
    //     $roles = Role::all();

    //     // dd($genders, $roles);
    //     return view('admin.create', compact('genders', 'roles'));
    // }
}
