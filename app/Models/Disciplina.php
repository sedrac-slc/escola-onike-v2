<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'nome',
        'created_by',
        'updated_by',
    ];

    public function cursos(){
        return $this->belongsToMany(Curso::class, CursoDisciplinaHorario::TABLE);
    }

    public function text(){
        return $this->nome;
    }

}
