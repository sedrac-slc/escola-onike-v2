<?php

namespace App\Models;

use App\Enum\PeriodoEnum;
use App\Enum\AnoCurricularEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'curso_id',
        'classe_id',
        'ano_lectivo',
        'ano_curricular',
        'periodo',
        'sala',
        'concat_fields',
        'created_by',
        'updated_by',
    ];

    function concatFields(){
        $periodo = PeriodoEnum::periodo($this->periodo);
        $concat = $this->ano_lectivo.'|'.$periodo.'|'.$this->sala;
        $curso = $this->curso();
        if(isset($curso->id)) $concat += $curso->concat_fields;
        return $concat;
    }

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, TurmaDisciplinaHorario::TABLE);
    }

    public function alunos(){
        return $this->belongsToMany(Aluno::class, Matricula::TABLE);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function periodo(){
        return PeriodoEnum::periodo($this->periodo);
    }

    public function ano_curricular(){
        return AnoCurricularEnum::anoCurricular($this->ano_curricular);
    }

    public function text(){
        return $this->curso->nome.'|'. $this->ano_lectivo . '|' . $this->periodo() . '|' . $this->sala;
    }

}
