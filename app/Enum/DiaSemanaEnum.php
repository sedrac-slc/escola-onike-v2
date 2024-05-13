<?php

namespace App\Enum;

final class DiaSemanaEnum{

    public const SEGUNDA_FEIRA = "SEGUNDA_FEIRA";
    public const TERCA_FEIRA = "TERCA_FEIRA";
    public const QUARTA_FEIRA = "QUARTA_FEIRA";
    public const QUINTA_FEIRA = "QUINTA_FEIRA";
    public const SEXTA_FEIRA = "SEXTA_FEIRA";

    public static function diaSemana($dia) : string{
        switch($dia){
            case DiaSemanaEnum::SEGUNDA_FEIRA:
                return "Segunda feira";
            case DiaSemanaEnum::TERCA_FEIRA:
                return "Terça feira";
            case DiaSemanaEnum::QUARTA_FEIRA:
                return "Quarta feira";
            case DiaSemanaEnum::QUINTA_FEIRA:
                return "Quinta feira";
            default:
                return "Sexta feira";
        }
    }

    public static function list(){
        return [
            static::SEGUNDA_FEIRA => static::diaSemana(static::SEGUNDA_FEIRA),
            static::TERCA_FEIRA => static::diaSemana(static::TERCA_FEIRA),
            static::QUARTA_FEIRA => static::diaSemana(static::QUARTA_FEIRA),
            static::QUINTA_FEIRA => static::diaSemana(static::QUINTA_FEIRA),
            static::SEXTA_FEIRA => static::diaSemana(static::SEXTA_FEIRA)
        ];
    }

}
