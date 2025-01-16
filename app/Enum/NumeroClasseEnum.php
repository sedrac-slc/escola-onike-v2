<?php

namespace App\Enum;

final class NumeroClasseEnum{

    public const SETIMA = "7";
    public const OITAVA = "8";
    public const NONA = "9";
    public const DECIMA = "10";
    public const DECIMA_PRIMEIRA = "11";
    public const DECIMA_SEGUNDA = "12";
    public const DECIMA_TERCEIRA = "13";

    public static function numeroClasse($num_classe) : string{
        switch($num_classe){
            case NumeroClasseEnum::SETIMA:
                return "7ª classe";
            case NumeroClasseEnum::OITAVA:
                return "8ª classe";
            case NumeroClasseEnum::NONA:
                return "9ª classe";
            case NumeroClasseEnum::DECIMA:
                return "10ª classe";
            case NumeroClasseEnum::DECIMA_PRIMEIRA:
                return "11ª classe";
            case NumeroClasseEnum::DECIMA_SEGUNDA:
                return "12ª classe";
            default:
                return "13ª classe";
        }
    }

    public static function list(){
        return [
            static::SETIMA => static::numeroClasse(static::SETIMA),
            static::OITAVA => static::numeroClasse(static::OITAVA),
            static::NONA => static::numeroClasse(static::NONA),
            static::DECIMA => static::numeroClasse(static::DECIMA),
            static::DECIMA_PRIMEIRA => static::numeroClasse(static::DECIMA_PRIMEIRA),
            static::DECIMA_SEGUNDA => static::numeroClasse(static::DECIMA_SEGUNDA),
            static::DECIMA_TERCEIRA => static::numeroClasse(static::DECIMA_TERCEIRA)
        ];
    }

    public static function keys(){
        return array_keys(NumeroClasseEnum::list());
    }

}
