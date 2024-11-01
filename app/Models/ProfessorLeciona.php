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
        'concat_fields',
        'professor_id',
        'created_by',
        'updated_by'
    ];

    function concatFields(){
        $concat = $this->formacao;
        $user = $this->professor();
        if(isset($user->id)) $concat += $user->concat_fields;
        return $concat;
    }

    public function turmaDisciplinaHorario(){
        return $this->belongsTo(TurmaDisciplinaHorario::class, 'turma_disciplina_horario_id', 'id');
    }

    public function professor(){
        return $this->belongsTo(Professor::class,'professor_id', 'id');
    }

}
