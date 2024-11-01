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
        'concat_fields',
        'created_by',
        'updated_by',
    ];

    function concatFields(){
        $num_classe = NumeroClasseEnum::numeroClasse($this->num_classe);
        return $this->nome.'|'.$this->num_classe;
    }

    public function turmas(){
        return $this->hasMany(Turma::class);
    }

    public function coordenadores(){
        return $this->belongsToMany(Coordenador::class);
    }

    public function numeroClasse(){
        return NumeroClasseEnum::numeroClasse($this->num_classe);
    }

    public function text(){
        return $this->nome . '|' . $this->numeroClasse();
    }

}
