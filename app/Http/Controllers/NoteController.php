<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    private $array = ['error'=>'', 'result'=>[]];
    public function all(){
        $notes = Note::all();

        foreach($notes as $note){
            $this->array['result'] = [
                'id' => $note->id,
                'title' => $note->title
            ];
        }

        return $this->array;
    }

    public function find($id){
        $note = Note::find($id);

        if($note){
            $this->array['result'] = $note;
        } else {
            $this->array['error']='Esse id não existe';
        }

        return $this->array;
    }

    public function store(Request $request){
        $title = $request->input('title');
        $body = $request->input('body');

        if($title && $body){
            $note= new Note();
            $note->title = $title;
            $note->body = $body;
            $note->save();

            $this->array['result'] = $note;
        } else {
            $this->array['error']='Campos não enviados';
        }

        return $this->array;
    }

    public function update(Request $request, $id){
        $title = $request->input('title');
        $body = $request->input('body');

        if($id && $title && $body){
            $note = Note::find($id);
            if($note){
                $note->title = $title;
                $note->body = $body;
                $note->save();

                $this->array['result'] = $note;
            } else {
                $this->array['error']='Id não existe';
            }
        } else {
            $this->array['error']='Campos não enviados';
        }

        return $this->array;
    }

    public function delete($id){
        $note = Note::find($id);

        if($note){
            $note->delete();
        } else {
            $this->array['error']='Id não encontrado';
        }
    }
}
