<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'nome',
        'horario_id',
        'created_by',
        'updated_by',
    ];

    public function horario(){
        return $this->belongsTo(Horario::class);
    }

    public function text(){
        return $this->nome.'| horario: '.$this->horario->text();
    }

}
