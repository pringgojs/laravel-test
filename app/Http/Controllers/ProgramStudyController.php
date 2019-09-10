<?php

namespace App\Http\Controllers;

use App\ProgramStudy;
use Illuminate\Http\Request;

class ProgramStudyController extends Controller
{
    public function index()
    {
        $view = view('program-study.index');
        $view->program_studies = ProgramStudy::all();
        return $view;
    }

    public function create()
    {
        $view = view('program-study.create');
        return $view;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $student = ProgramStudy::insert($request->except('_token'));

        return redirect('program-study');
    }

    public function edit($id)
    {
        $view = view('program-study.edit');
        $view->program_study = ProgramStudy::findOrFail($id);
        return $view;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $program_study = ProgramStudy::findOrFail($id);
        $program_study->update($request->except(['_token', '_method']));
        return redirect('program-study');
    }

    public function destroy($id)
    {
        $program_study = ProgramStudy::findOrFail($id);
        $program_study->delete();
        return redirect('program-study');
    }
}
