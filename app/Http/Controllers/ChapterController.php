<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Subject $subject)
    {
        $chapters = $subject->chapters;
        return view('chapter.index', compact('chapters','subject'));
    }

    public function create(Subject $subject)
    {
        return view('chapter.create', compact('subject'));
    }

    public function store(Subject $subject)
    {
        $data = request()->validate([
            'chapter' => 'required'
        ]);

        //dd($subject);
        $chapter = $subject->chapters()->create($data);

        //dd($chapter);
        return redirect('chapters/'.$subject->id);
    }

    public function show(Chapter $chapter)
    {
        return view('chapter.show', compact('chapter'));
    }

    public function edit(Chapter $chapter)
    {
        return view('chapter.edit', compact('chapter'));
    }

    public function update(Chapter $chapter)
    {
        $data = request()->validate([
            'chapter' => 'required'
        ]);

        $chapter->update($data);

        return redirect('chapters/'.$chapter->subject_id);
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        $subject = $chapter->subject_id;   

        return redirect('chapters/'.$subject);
    }
}
