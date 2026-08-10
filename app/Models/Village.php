<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $primaryKey = 'village_id';

    protected $fillable = [
        'village_name',
        'commune_id',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function commune()
    {
        return $this->hasMany(Commune::class, 'village_id', 'village_id');
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

}
