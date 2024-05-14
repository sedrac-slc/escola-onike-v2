<?php

namespace App\Validator;

use App\Enum\FuncaoEnum;
use App\Models\Nota;

class NotaValidator{


    public static function getNotas(){
        $auth = auth()->user();
        $notas = Nota::orderBy('created_at','DESC');
        if($auth->funcao == FuncaoEnum::ALUNO)  $notas->where('aluno_id', $auth->aluno->id);
        return $notas->paginate();
    }

}
