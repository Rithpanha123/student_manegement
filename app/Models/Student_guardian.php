<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_guardian extends Model
{
    protected $primaryKey = 'student_guardian_id';

    protected $fillable = [
        'mom_name',
        'job_mom',
        'mom_phone',
        'dad_name',
        'job_dad',
        'dad_phone',
        'guardian_name',
        'guardian_phone',
        'guadian_relationship',
        'created_at',
        'updated_at'
    ];
}
