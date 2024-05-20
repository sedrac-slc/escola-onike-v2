<?php

namespace App\Enum;

final class PeriodoEnum{

    public const MANHA = "MANHA";
    public const TARDE = "TARDE";
    public const NOITE = "NOITE";

    public static function periodo($periodo) : string{
        switch($periodo){
            case PeriodoEnum::MANHA:
                return "Manhã";
            case PeriodoEnum::TARDE:
                return "Tarde";
            default:
                return "Noite";
        }
    }

    public static function list(){
        return [
            static::MANHA => static::periodo(static::MANHA),
            static::TARDE => static::periodo(static::TARDE),
            static::NOITE => static::periodo(static::NOITE),
        ];
    }

    public static function keys(){
        return array_keys(PeriodoEnum::list());
    }

}
