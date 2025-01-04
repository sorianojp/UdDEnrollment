<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\PaymentDescription;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Student $student)
    {
        $paymentDescriptions = PaymentDescription::all();
        return view('payments.create', compact('student', 'paymentDescriptions'));
    }

    public function store(Request $request, Student $student)
    {
        $request->validate([
            'payment_description_id' => 'required|unique:payments,payment_description_id',
            'amount' => 'required|numeric',
        ],[
            'payment_description_id.unique' => 'Payment Already Been Made!',
        ]);

        $student->payments()->create([
            'payment_description_id' => $request->payment_description_id,
            'amount' => $request->amount,
        ]);
        return back()->with('status', 'Payment recorded successfully');
    }
}
