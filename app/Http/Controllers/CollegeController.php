<?php

namespace App\Http\Controllers;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index',compact('colleges'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:colleges,code',
            'name' => 'required|unique:colleges,name'
        ]);
        College::create($request->all());
        return redirect()->route('colleges.index')->with('status', 'College added successfully.!');
    }
}
