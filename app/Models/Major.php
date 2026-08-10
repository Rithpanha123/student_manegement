<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $primaryKey = 'major_id';

    protected $fillable = [
        'major_name',
        'major_code',
        'faculty_id',
        'description',
        'total_cradits',
        'duration_years',
        'degree',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->hasMany(Student::class, 'major_id', 'major_id');
    }
}
