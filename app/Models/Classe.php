<?php

namespace App\Models;

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

}
