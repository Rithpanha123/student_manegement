<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'city_id';

    protected $fillable = [
        'city_name',
        'city_code',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->hasMany(Student::class, 'city_id', 'city_id', 'home_city_id');
    }
}
