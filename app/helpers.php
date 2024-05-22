<?php

if(!function_exists('pivot_audict')){

    function pivot_audict($data){
        $array = [];
        foreach($data as $param){
            $array[$param] = [];
            if(isset($data['created_by'])) $array[$param] = ["created_by" => $data["created_by"]];
            if(isset($data['created_at'])) $array[$param] = array_merge($array[$param], ["created_at" => $data["created_at"]]);
            if(isset($data['updated_by'])) $array[$param] = array_merge($array[$param], ["updated_by" => $data["updated_by"]]);
            if(isset($data['updated_at'])) $array[$param] = array_merge($array[$param], ["updated_at" => $data["updated_at"]]);
        }
        return $array;
    }

}

if(!function_exists('nota')){

    function nota($aluno, $turmaDisciplinaHorario){
        try{
            return App\Models\Nota::where([
                'aluno_id' => $aluno->id,
                'disciplina_id' => $turmaDisciplinaHorario->disciplina_id,
                'turma_id' => $turmaDisciplinaHorario->turma_id,
            ])->first();
        }catch(\Exception){
            return null;
        }
    }

}
