<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Enum\NumeroClasseEnum;

class Classe extends Model
{
    use HasFactory,  HasUuids;

    protected $fillable = [
        'id',
        'curso_id',
        'num_classe',
        'created_by',
        'updated_by',
    ];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function numeroClasse(){
        return NumeroClasseEnum::numeroClasse($this->num_classe);
    }
}
