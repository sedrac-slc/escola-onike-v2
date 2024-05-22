<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProfessorLeciona extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "professor_leciona";

    protected $table = ProfessorLeciona::TABLE;

    protected $fillable = [
        'turma_disciplina_horario_id',
        'professor_id',
        'created_by',
        'updated_by'
    ];

    public function cursoDisciplinaHorario(){
        return $this->belongsTo(CursoDisciplinaHorario::class,'curso_disciplina_horario_id', 'id');
    }

    public function professor(){
        return $this->belongsTo(Professor::class,'professor_id', 'id');
    }

}
