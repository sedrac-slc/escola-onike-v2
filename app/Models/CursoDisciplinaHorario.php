<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CursoDisciplinaHorario extends Model
{
    use HasFactory, HasUuids;


    public const TABLE = "curso_disciplina_horarios";

    public const FILLABLE = ['curso_id', 'horario_id', 'disciplina_id'];

    protected $table = CursoDisciplinaHorario::TABLE;

    protected $fillable = ['curso_id', 'horario_id', 'disciplina_id', 'created_by', 'updated_by'];

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }

    public function horario(){
        return $this->belongsTo(Horario::class,  'horario_id', 'id');
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class, 'disciplina_id', 'id');
    }

    public function text(){
        return $this->curso->nome.'|'.$this->disciplina->nome.'|'.$this->horario->text();
    }

}
