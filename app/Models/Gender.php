<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'genders';
    protected $primaryKey = 'gender_id';
    protected $fillable = [
    'gender_name',
    'gender_code',
    'is_active',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'gender_id', 'gender_id');
    }
}
