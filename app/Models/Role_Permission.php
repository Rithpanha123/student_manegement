<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    protected $table = 'role_permissions';
    protected $primaryKey = 'role_permission_id';
    protected $fillable = [
        'role_id',
        'permission_id',
    ];
}
