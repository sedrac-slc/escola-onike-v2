<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'aluno_id',
        'pauta_id',
        'trimestre_id',
        'disciplina_id',
        'mac',
        'npp',
        'npt',
        'created_by',
        'updated_by',
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }

    public function trimestre(){
        return $this->belongsTo(Trimestre::class);
    }

    public function pauta(){
        return $this->belongsTo(Pauta::class);
    }

}
