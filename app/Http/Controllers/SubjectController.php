<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function create()
    {
        return view('subject.create');
    }

    public function store()
    {
        $data = request()->validate([
            'subject' => 'required',
            'subjectcode' => 'required'
        ]);

        //dd($data);

        $subject = auth()->user()->subjects()->create($data);

        return redirect('/home');
    }

    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    public function update(Subject $subject)
    {
        $data = request()->validate([
            'subject' => 'required',
            'subjectcode' => 'required'
        ]);

        //dd($data);

        $subject->update($data);

        return redirect('/home');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect('/home');
    }
}
