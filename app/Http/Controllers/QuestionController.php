<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Chapter;
use App\Question;

class QuestionController extends Controller
{
    public function indexSubject(Subject $subject)
    {
        return view('question.indexSubject', compact('subject'));
    }

    public function indexChapter(Chapter $chapter)
    {
        return view('question.indexChapter', compact('chapter'));
    }

    public function createSubject(Subject $subject)
    {
        return view('question.createSubject', compact('subject'));
    }

    public function createChapter(Chapter $chapter)
    {
        return view('question.createChapter', compact('chapter'));
    }

    public function storeSubject(Subject $subject)
    {
        $data = request()->validate([
            'question' => 'required',
            'level' => 'required',
            'mark' => 'required',
            'answer' => 'required'
        ]);

        $question = $subject->questions()->create($data);

        return redirect('questions/'.$question->subject_id);
    }

    public function storeChapter(Chapter $chapter)
    {
        $data = request()->validate([
            'question' => 'required',
            'level' => 'required',
            'mark' => 'required',
            'answer' => 'required',
            'subject_id' => 'required'
        ]);

        //dd($data);

        $question = $chapter->questions()->create($data);

        return redirect('questions/'.$question->chapter_id.'/chapters');
    }

    public function showSubject(Question $question)
    {
        return view('question.showSubject', compact('question'));
    }

    public function showChapter(Question $question)
    {
        return view('question.showChapter', compact('question'));
    }

    public function editSubject(Question $question)
    {
        return view('question.editSubject', compact('question'));
    }

    public function editChapter(Question $question)
    {
        return view('question.editChapter', compact('question'));
    }

    public function updateSubject(Question $question)
    {
        $data = request()->validate([
            'question' => 'required',
            'level' => 'required',
            'mark' => 'required',
            'answer' => 'required'
        ]);
 
        $question->update($data);

        return redirect('questions/'.$question->subject_id);
    }

    public function updateChapter(Question $question)
    {
        $data = request()->validate([
            'question' => 'required',
            'level' => 'required',
            'mark' => 'required',
            'answer' => 'required'
        ]);
 
        $question->update($data);

        return redirect('questions/'.$question->chapter_id.'/chapters');
    }

    public function destroySubject(Question $question)
    {
        $question->delete();

        return redirect('questions/'.$question->subject_id.'/subject');
    }

    public function destroyChapter(Question $question)
    {
        $question->delete();

        return redirect('questions/'.$question->subject_id.'/chapters');
    }
}
