<?php

namespace App\Http\Controllers;

use App\Student;
use App\ProgramStudy;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $view = view('student.index');
        $view->students = Student::all();
        return $view;
    }

    public function create()
    {
        $view = view('student.create');
        $view->program_studies = ProgramStudy::all();
        return $view;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'program_study_id' => 'required',
        ]);

        $student = Student::insert($request->except('_token'));

        return redirect('student');
    }

    public function edit($id)
    {
        $view = view('student.edit');
        $view->student = Student::findOrFail($id);
        $view->program_studies = ProgramStudy::all();
        return $view;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'program_study_id' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->except(['_token', '_method']));
        return redirect('student');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('student');
    }

    
}
