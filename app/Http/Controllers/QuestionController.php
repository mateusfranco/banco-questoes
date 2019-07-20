<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(5);
        
        return view('questions.questions', compact('questions'));
    }

    public function add()
    {
        return view('questions.register');
    }

    public function addQuestion(Request $request, Question $question)
    {
        $question->addQuestion($request);
        return redirect()->back();
    }

    public function questionExplain(int $id, Question $question, Request $request)
    {
        $expecificQuestion = $question->searchByID($id);
        $expecificQuestion = $question->selectToShow($id, $expecificQuestion, $request);
        return view('questions.explanation', compact('expecificQuestion'));
    }

    public function questionSelect(Question $question, Request $request)
    {
        $question->changeSelection($request);
        return redirect(url('/question/view'));
    }

    public function questionReset(Question $question, Request $request)
    {
        $question->resetSelection($request);
        return redirect(url('/question/view'));
    }
}
