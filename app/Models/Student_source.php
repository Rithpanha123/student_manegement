<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_source extends Model
{
    protected $pirmaryKey = 'student_source_id';

    protected $fillable = [
        'student_source_name',
        'created_at',
        'updated_at'
    ];
}
