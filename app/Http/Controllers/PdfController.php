<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Pdfs;
use PDF;

class PdfController extends Controller
{
    public function generateQuestions(Question $question,Request $request, Pdfs $pdfModel)
    {        
        $questionsToPrint = $pdfModel->generateQuestionsPDF($question,$request);
        // dd($questionsToPrint);
        $pdf = PDF::loadView('pdf.pdf-question', compact('questionsToPrint'));
        return $pdf->stream('questions.pdf');
    }
}
