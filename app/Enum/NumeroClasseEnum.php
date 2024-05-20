<?php

namespace App\Enum;

final class NumeroClasseEnum{

    public const SETIMA = "SETIMA";
    public const OITAVA = "OITAVA";
    public const NONA = "NONA";
    public const DECIMA = "DECIMA";
    public const DECIMA_PRIMEIRA = "DECIMA_PRIMEIRA";
    public const DECIMA_SEGUNDA = "DECIMA_SEGUNDA";
    public const DECIMA_TERCEIRA = "DECIMA_TERCEIRA";

    public static function numeroClasse($num_classe) : string{
        switch($num_classe){
            case NumeroClasseEnum::SETIMA:
                return "Sétima";
            case NumeroClasseEnum::OITAVA:
                return "Oitava";
            case NumeroClasseEnum::NONA:
                return "Nona";
            case NumeroClasseEnum::DECIMA:
                return "Décima";
            case NumeroClasseEnum::DECIMA_PRIMEIRA:
                return "Décima primeira";
            case NumeroClasseEnum::DECIMA_SEGUNDA:
                return "Décima segunda";
            default:
                return "Décima terceira";
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
