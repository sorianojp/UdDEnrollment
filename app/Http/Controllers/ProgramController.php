<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\College;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(College $college)
    {
        $programs = Program::all();
        return view('programs.index',compact('college', 'programs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request, College $college)
    {
        $request->validate([
            'code' => 'required|unique:programs,code',
            'name' => 'required|unique:programs,name'
        ]);
        $college->programs()->create($request->all());
        return redirect()->route('colleges.programs.index', $college)
                        ->with('status','Program added successfully.');
    }
}
