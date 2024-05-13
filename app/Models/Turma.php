<?php

namespace App\Models;

use App\Enum\PeriodoEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'ano_lectivo',
        'periodo',
        'sala',
        'created_by',
        'updated_by',
    ];

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function periodo(){
        return PeriodoEnum::periodo($this->periodo);
    }

    public function text(){
        return $this->ano_lectivo . '|' . $this->periodo() . '|' . $this->sala;
    }

}
