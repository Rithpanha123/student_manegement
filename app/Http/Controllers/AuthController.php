<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('auth.login', compact('user'));
    }

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

    /**
     * Get user's profile picture URL or generate avatar
     */
    public function getAvatarUrlAttribute()
    {
        // ប្រសិនបើមានរូបភាពក្នុង Database
        if ($this->profile_picture) {
            return asset('storage/' . $this->profile_picture);
        }
        
        // ប្រសិនបើគ្មានរូបភាព បង្កើត Avatar URL
        return $this->getAvatarUrl();
    }

    /**
     * Get avatar with first letter
     */
    public function getAvatarLetterAttribute()
    {
        // យកអក្សរដំបូងពី username
        return strtoupper(substr($this->username, 0, 2));
    }

    /**
     * Generate avatar URL using UI Avatars API
     */
    public function getAvatarUrl()
    {
        $name = urlencode($this->username);
        $backgroundColor = $this->getAvatarColor();
        
        // ប្រើ UI Avatars API (Free)
        return "https://ui-avatars.com/api/?name={$name}&background={$backgroundColor}&color=fff&size=128&rounded=true&bold=true";
    }

    /**
     * Get random color for avatar based on user id
     */
    private function getAvatarColor()
    {
        $colors = [
            '1abc9c', '2ecc71', '3498db', '9b59b6', 
            'e67e22', 'e74c3c', '1abc9c', '2c3e50',
            '16a085', '27ae60', '2980b9', '8e44ad',
            'd35400', 'c0392b', '7f8c8d', '2c3e50'
        ];
        
        return $colors[$this->user_id % count($colors)];
    }

    /**
     * Get user's display name
     */
    public function getDisplayNameAttribute()
    {
        return $this->username;
    }

    /**
     * Get user's role display
     */
    public function getRoleDisplayAttribute()
    {
        if ($this->role) {
            return $this->role->role_name;
        }
        return 'User';
    }


}
