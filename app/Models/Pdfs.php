<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Question;

class Pdfs extends Model
{
    public function generateQuestionsPDF(Question $question, Request $request)
    {
        $questionsToPDF = array();
        $selecteds = request()->session()->get('selecteds',[]);
        if($selecteds){
            foreach ($selecteds as $value) {
                if($value['selected']){
                    $id = $value['id'];
                    $newQuestion = $question->searchByID($id);
                    array_push($questionsToPDF, $newQuestion);
                }
            }
        }
        return $questionsToPDF;
    }
}
