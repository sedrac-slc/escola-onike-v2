<?php

namespace App\Enum;

final class GeneroEnum{

    public const MASCULINO = "M";
    public const FEMENINO = "F";

    public static function genero($genero) : string{
        switch($genero){
            case GeneroEnum::MASCULINO:
                return "Masculino";
            default:
                return "Femenino";
        }
    }

    public static function list(){
        return [
            static::MASCULINO => static::genero(static::MASCULINO),
            static::FEMENINO => static::genero(static::FEMENINO),
        ];
    }

    public static function keys(){
        return array_keys(GeneroEnum::list());
    }

}
