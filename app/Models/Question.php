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
}
