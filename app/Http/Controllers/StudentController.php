<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'student_no' => 'required|unique:students,student_no'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('status', 'Success!');
    }
}
