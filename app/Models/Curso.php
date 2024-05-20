<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Enum\NumeroClasseEnum;

class Curso extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'nome',
        'num_classe',
        'created_by',
        'updated_by',
    ];

    public function turmas(){
        return $this->hasMany(Turma::class);
    }

    public function coordenadores(){
        return $this->belongsToMany(Coordenador::class);
    }

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, CursoDisciplinaHorario::TABLE);
    }

    public function numeroClasse(){
        return NumeroClasseEnum::numeroClasse($this->num_classe);
    }

    public function text(){
        return $this->nome . '|' . $this->numeroClasse();
    }

}
