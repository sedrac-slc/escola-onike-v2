<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'aluno_id',
        'turma_id',
        'disciplina_id',
        'trimestre_id',
        'mac',
        'npp',
        'npt',
        'mt1',
        'mt2',
        'mt3',
        'exame',
        'mfd',
        'mf',
        'created_by',
        'updated_by',
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function trimestre(){
        return $this->belongsTo(Trimestre::class);
    }

}
