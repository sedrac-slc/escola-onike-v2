<?php

namespace App\Enum;

final class AnoCurricularEnum{

    public const PRIMERO = 1;
    public const SEGUNDO = 2;
    public const TERCEIRO = 3;

    public static function anoCurricular($anoCurricular) : string{
        switch($anoCurricular){
            case AnoCurricularEnum::PRIMERO:
                return "A";
            case AnoCurricularEnum::SEGUNDO:
                return "B";
            case AnoCurricularEnum::TERCEIRO:
                return "C";
            default:
                return "-";
        }
    }

    public static function list(){
        return [
            static::PRIMERO => static::anoCurricular(static::PRIMERO),
            static::SEGUNDO => static::anoCurricular(static::SEGUNDO),
            static::TERCEIRO => static::anoCurricular(static::TERCEIRO),
        ];
    }

    public static function keys(){
        return array_keys(AnoCurricularEnum::list());
    }

}
