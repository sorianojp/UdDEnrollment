<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Program;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    public function index(Student $student)
    {
        $programs = Program::all();
        return view('enrollments.index',compact('student', 'programs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request, Student $student)
    {
        $request->validate([
            'year_level' => 'required',
            'stud_type' => 'required',
            'program_id' => 'required'
        ]);
        $student->enrollments()->create($request->all());
        return redirect()->route('students.enrollments.index', $student)
                        ->with('status','Enrollment added successfully.');
    }
}
