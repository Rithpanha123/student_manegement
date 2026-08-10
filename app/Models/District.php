<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $primaryKey = 'district_id';

    protected $fillable = [
        'district_name',
        'city_id',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function city()
    {
        return $this->hasMany(City::class, 'city_id', 'city_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
