<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study_shift extends Model
{
    protected $primaryKey = 'study_shift_id';

    protected $fillable = [
        'shift_name',
        'start_time',
        'end_time',
        'description',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // public function commune()
    // {
    //     return $this->hasMany(Commune::class, 'commune_id', 'commune_id');
    // }

    // public function getStatusAttribute()
    // {
    //     return $this->is_active ? 'Active' : 'Inactive';
    // }
}
