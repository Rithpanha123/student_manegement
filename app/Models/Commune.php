<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $primaryKey = 'commune_id';

    protected $fillable = [
        'commune_name',
        'district_id',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function district()
    {
        return $this->hasMany(Disctrict::class, 'disctrict_id', 'district_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
