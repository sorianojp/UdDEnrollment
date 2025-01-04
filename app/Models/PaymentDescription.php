<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDescription extends Model
{
    protected $fillable = ['description'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
