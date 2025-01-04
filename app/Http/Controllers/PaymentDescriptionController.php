<?php

namespace App\Http\Controllers;
use App\Models\PaymentDescription;
use Illuminate\Http\Request;

class PaymentDescriptionController extends Controller
{
    public function index()
    {
        $paymentDescriptions = PaymentDescription::all();
        return view('payments.index',compact('paymentDescriptions'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|unique:payment_descriptions,description',
        ]);
        PaymentDescription::create($request->all());
        return redirect()->route('paymentdescriptions.index')->with('status', 'Payment Description Added Successfully.!');
    }
}
