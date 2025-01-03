<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'year_level',
        'stud_type',
        'program_id'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
