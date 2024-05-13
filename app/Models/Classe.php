<?php

namespace App\Models;

use App\Enum\NumeroClasseEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'turma_id',
        'curso_id',
        'num_classe',
        'created_by',
        'updated_by',
    ];

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function numeroClasse(){
        return NumeroClasseEnum::numeroClasse($this->num_classe);
    }

    public function text(){
        return $this->numeroClasse().' | turma:'.$this->turma->text().' | curso:'.$this->curso->text();
    }

}
