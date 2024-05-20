<?php

namespace App\Enum;

final class NumeroEnum{

    public const PRIMEIRO = "PRIMEIRO";
    public const SEGUNDO = "SEGUNDO";
    public const TERCEIRO = "TERCEIRO";

    public static function numero($numero) : string{
        switch($numero){
            case NumeroEnum::PRIMEIRO:
                return "Primeiro";
            case NumeroEnum::SEGUNDO:
                return "Segundo";
            default:
                return "Terceiro";
        }
    }

    public static function list(){
        return [
            static::PRIMEIRO => static::numero(static::PRIMEIRO),
            static::SEGUNDO => static::numero(static::SEGUNDO),
            static::TERCEIRO => static::numero(static::TERCEIRO),
        ];
    }

    public static function keys(){
        return array_keys(NumeroEnum::list());
    }

}
