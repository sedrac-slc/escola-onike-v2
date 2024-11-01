<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "matriculas";

    protected $table = Matricula::TABLE;

    protected $fillable = [
        'id',
        'aluno_id',
        'turma_id',
        'created_by',
        'updated_by',
        'concat_fields',
    ];

    function concatFields(){
        $concat = "";
        $aluno = $this->aluno();
        $turma = $this->turma();
        if(isset($aluno->id)) $concat += $aluno->concat_fields;
        if(isset($turma->id)) $concat += $turma->concat_fields;
        return $concat;
    }

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

}
