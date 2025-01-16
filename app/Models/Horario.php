<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\DiaSemanaEnum;

class Horario extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'curso_id',
        'dia_semana',
        'disciplina_id',
        'hora_inicio',
        'hora_termino',
        'concat_fields',
        'created_by',
        'updated_by',
    ];

    public function concatFields(){
        return $this->dia_semana.'|'.$this->hora_inicio.'|'.$this->hora_termino;
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function professores(){
        return $this->belongsToMany(Professor::class);
    }

    public function diaSemana(){
        return DiaSemanaEnum::diaSemana($this->dia_semana);
    }

    public function text(){
        return $this->diaSemana()."|".$this->hora_inicio." à ".$this->hora_termino;
    }

    public function intervalo(){
        return $this->hora_inicio." à ".$this->hora_termino;
    }

}
