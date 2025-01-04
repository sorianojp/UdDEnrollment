<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'student_id', 'payment_description_id', 'amount'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function paymentDescription()
    {
        return $this->belongsTo(PaymentDescription::class);
    }
}
