<?php

namespace App\Models;

use App\Enum\NumeroClasseEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function numeroClasse(){
        return NumeroClasseEnum::numeroClasse($this->num_classe);
    }

    public function text(){
        return $this->nome . '|' . $this->numeroClasse();
    }

}
