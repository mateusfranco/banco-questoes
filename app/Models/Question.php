<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Runner\Exception;

class Question extends Model
{
    protected $fillable = [
        'name', 'text', 'level', 'about', 'awnser',
    ];


    public function addQuestion($data)
    {
        try{
            $this->name = $data['name'];
            $this->text = $data['text'];
            $this->level = $data['level'];
            $this->awnser = $data['awnser'];
            $this->about = $data['about'];
            $this->save();
        }catch(Exception $e){
            return([
                'status' => false,
                'message' => 'salvou no banco',
            ]);
        }
        return([
            'status' => true,
            'message' => 'conseguiu salvar no banco',
        ]);
    
    }

    public function searchByID($id, $request)
    {
        $question = $this->where('id', $id)->get();
        if($question)
            $question = $question[0];
        $selecteds = $request->session()->get('selecteds',[]);
        if(isset($selecteds[$id]) && $selecteds[$id]['selected']){
            $question['selected'] = true;
        }
            
        return $question;
    }
    
    public function changeSelection($request)
    {
        $id = $request['id'];
        $questions = $request->session()->get('selecteds',[]);
        if(isset($questions[$id]) && $questions[$id]['selected'])
            $questions[$id] = ['selected' => false,
                                'id' => -1];
        else
            $questions[$id] = ['selected' => true,
                                'id' => -1]; 
        $questions[$id]['id'] = $id;
        $request->session()->put('selecteds',$questions);
        return;
    }

    public function resetSelection($request)
    {
        $questions = $request->session()->get('selecteds',[]);
        foreach ($questions as $value) {
            $id = $value['id'];
            $questions[$id]['selected']=false;
        }
        $request->session()->put('selecteds',$questions);
        return;
    }
}
