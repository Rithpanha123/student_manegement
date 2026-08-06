<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // public function index()
    // {
    //     return view('auth.login');
    // }

    public function index()
    {
        $seconds = 0;

        // Check Session lockout_until when User Refresh Page (GET Request)
        if (session()->has('lockout_until')) {
            $remaining = session('lockout_until') - time();

            if ($remaining > 0) {
                $seconds = $remaining;
            } else {
                // if end of time delete session 
                session()->forget(['lockout_until', 'lockout_seconds']);
            }
        }

        return view('auth.login', compact('seconds'));
    }



    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $throttleKey = Str::lower($request->input('username')) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            
            session(['lockout_seconds' => $seconds]);
            session(['lockout_until' => time() + $seconds]);
            
            return back()->withErrors([
                'username' => "Too many login attempts. Please try again in $seconds seconds.",
            ])->with('lockout_seconds', $seconds)->onlyInput('username');
        }


        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => true,
        ];

        if (Auth::attempt($credentials)) {
            RateLimiter::clear($throttleKey);
            session()->forget('lockout_until');
            session()->forget('lockout_seconds');
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        RateLimiter::hit($throttleKey, 60);

        return back()->withErrors([
            'username' => 'Username or Password is incorrect.',
        ])->onlyInput('username');
    }

    // Method for update session
    public function updateLockoutSession(Request $request)
    {
        $seconds = $request->input('seconds');
        if ($seconds !== null && $seconds > 0) {
            session(['lockout_seconds' => $seconds]);
            return response()->json(['success' => true, 'seconds' => $seconds]);
        } else {
            session()->forget('lockout_seconds');
            session()->forget('lockout_until');
            return response()->json(['success' => true, 'seconds' => 0, 'closed' => true]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
