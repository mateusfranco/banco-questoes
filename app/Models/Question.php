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
        $question = $this->where('id', $id)->get()->first();
        $questionSelected = $request->session()->get($id,false);
        if($questionSelected)
        {
            $question['selected'] = true;
            echo('mudou algo');
        }
        return $question;
    }
    
    public function changeSelection($id, $request)
    {
        $question = $request->session()->get($id,false);
        if($question)
        {
            $request->session()->pull($id);
            return;
        }
        $request->session()->put($id, true);
        return;
        
    }
}
