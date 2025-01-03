<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'student_no'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} {$this->middle_name}";
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
