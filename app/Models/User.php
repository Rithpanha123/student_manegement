<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    protected $fillable =[
        'username',
        'password_hash',
        'gender_id',
        'email',
        'role_id',
        'is_active',
        'last_login',
        'profile_picture',
    ];

    protected $hidden =[
        'password_hash',
        'remember_token',
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'last_login' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    public function getStatusBadgeAttribute()
    {
        return $this->is_active 
        ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
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
