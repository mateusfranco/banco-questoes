<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        // $questions = Question::get(['id','name','level','about']);
        $questions = Question::paginate();
        
        return view('questions.questions', compact('questions'));
    }

    public function add()
    {
        return view('questions.questions-register');
    }

    public function addQuestion(Request $request, Question $question)
    {
        $retorno = $question->addQuestion($request);
        redirect()->back();
    }
}
