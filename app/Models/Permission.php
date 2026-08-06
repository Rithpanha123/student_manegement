<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $fillable = [
        'permission_name',
        'permission_code',
        'module',
        'description',
        'is_active',
    ];
}
