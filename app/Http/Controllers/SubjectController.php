<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //index
    public function index()
    {

        $subjects = Subject::paginate(10);
        return view('pages.subjects.index', compact('subjects'));
    }

    //create
    public function create()
    {
        $lecturers  = User::where('roles', 'dosen')->get();
        return view('pages.subjects.create', compact('lecturers'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subjects,name',
            'description' => 'required',
            'lecturer_id' => 'required|exists:users,id',
        ]);

        Subject::create($request->all());
        return redirect()->route('pages.subjects.index')->with('success', 'Subject created successfully.');
    }

    //edit
    public function edit($id)
    {
        $subject = Subject::find($id);
        $lecturers  = User::where('roles', 'dosen')->get();
        return view('pages.subjects.edit', compact('subject', 'lecturers'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'lecturer_id' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'sks' => 'required',
            'kode_matakuliah' => 'required',
            'deskripsi' => 'required',
        ]);

        $subject = \App\Models\Subject::find($id);
        $subject->title = $request->get('title');
        $subject->lecturer_id = $request->get('lecturer_id');
        $subject->semester = $request->get('semester');
        $subject->tahun_akademik = $request->get('tahun_akademik');
        $subject->sks = $request->get('sks');
        $subject->kode_matakuliah = $request->get('kode_matakuliah');
        $subject->deskripsi = $request->get('deskripsi');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject has been updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        $subject = \App\Models\Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject has been deleted successfully.');
    }
}
