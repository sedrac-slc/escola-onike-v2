<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TurmaDisciplinaHorario extends Model
{
    use HasFactory, HasUuids;


    public const TABLE = "turma_disciplina_horarios";

    public const FILLABLE = ['turma_id', 'horario_id', 'disciplina_id'];

    protected $table = TurmaDisciplinaHorario::TABLE;

    protected $fillable = ['turma_id', 'horario_id', 'disciplina_id', 'created_by', 'updated_by'];

    public function turma(){
        return $this->belongsTo(Turma::class, 'turma_id', 'id');
    }

    public function horario(){
        return $this->belongsTo(Horario::class,  'horario_id', 'id');
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class, 'disciplina_id', 'id');
    }

    public function professores(){
        return $this->belongsToMany(Professor::class, ProfessorLeciona::TABLE);
    }

    public function text(){
        return $this->turma->curso->nome.'|'.$this->turma->curso->numeroClasse().'|'.$this->disciplina->nome.'|'.$this->horario->text();
    }

}
