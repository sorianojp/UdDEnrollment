<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'college_id', 'code', 'name',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
