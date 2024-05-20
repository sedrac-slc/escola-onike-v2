<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'aluno_id',
        'turma_id',
        'created_by',
        'updated_by',
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

}
