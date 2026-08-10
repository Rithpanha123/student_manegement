<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey  = 'student_id';

    protected $fillable = [
        'student_code',
        'khmer_name',
        'english_name',
        'gender_id',
        'dateofbirth',
        'nationality',
        'start_date_study',
        'tell1',
        'tell2',
        'email',
        'village_id',
        'commune_id',
        'district_id',
        'city_id',
        'study_shift_id',
        'student_guardian_id',
        'major_id',
        'enrollment_date',
        'student_status',
        'is_active',
        'created_at',
        'updated_at',
        'religion',
        'photo_path',
        'home_number',
        'street_number',
        'home_home_number',
        'home_street_number',
        'home_village_id',
        'home_commune_id',
        'home_district_id',
        'home_city_id',
        'student_source_id',
        'previous_school',
        'privious_grade',
        'school_address'
    ];

    protected $casts =[
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function village()
    {
        return $this->belongsTo(Vilage::class, 'village_id', 'village_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'commune_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'ctiy_id');
    }

    public function studyShift()
    {
        return $this->belongsTo(Study_shift::class, 'study_shift_id', 'study_shift_id');
    }

    public function studentGuardian()
    {
        return $this->belongsTo(Student_guardian::class, 'student_guardian_id', 'student_guardian_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'major_id');
    }

    public function homeVillage()
    {
        return $this->belongsTo(Vilage::class, 'home_village_id', 'village_id');
    }

    public function home_commune()
    {
        return $this->belongsTo(Commune::class, 'home_commune_id', 'commune_id');
    }

    public function home_district()
    {
        return $this->belongsTo(District::class, 'home_district_id', 'district_id');
    }

    public function homeCity()
    {
        return $this->belongsTo(City::class, 'home_city_id', 'ctiy_id');
    }

    public function studentSource()
    {
        return $this->belongsTo(Student_source::class, 'student_source_id', 'student_student_id');
    }


}

