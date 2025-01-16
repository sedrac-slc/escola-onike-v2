<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'nome',
        'concat_fields',
        'created_by',
        'updated_by',
    ];

    function concatFields(){
        return $this->nome;
    }

    public function turmas(){
        return $this->hasMany(Turma::class);
    }

    public function coordenadores(){
        return $this->belongsToMany(Coordenador::class);
    }

    public function text(){
        return $this->nome ;
    }

}
