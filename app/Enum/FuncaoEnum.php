<?php

namespace App\Enum;

final class FuncaoEnum{
    public const COORDENADOR_CURSO = "COORDENADOR_CURSO";
    public const DIRECTOR_GERAL = "DIRECTOR_GERAL";
    public const SECRETARIO = "SECRETARIO";
    public const PROFESSOR = "PROFESSOR";
    public const ALUNO = "ALUNO";

    public static function funcao($funcao) : string{
        switch($funcao){
            case FuncaoEnum::COORDENADOR_CURSO:
                return "Coordenador do curso";
            case FuncaoEnum::DIRECTOR_GERAL:
                return "Director Geral";
            case FuncaoEnum::SECRETARIO:
                return "Secretario(a)";
            case FuncaoEnum::PROFESSOR:
                return "Professor";
            case FuncaoEnum::ALUNO:
                return "Aluno";
            default:
                return "funcionário";
        }
    }

    public static function jobs(){
        return [
            static::DIRECTOR_GERAL => static::funcao(static::DIRECTOR_GERAL),
            static::SECRETARIO => static::funcao(static::SECRETARIO)
        ];
    }


}
