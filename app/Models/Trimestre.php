<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\NumeroEnum;

class Trimestre extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'numero',
        'data_inicio',
        'data_termino',
        'created_by',
        'updated_by',
    ];

    public function numero(){
        return NumeroEnum::numero($this->numero);
    }

    public function text(){
        return $this->data_inicio.' à '.$this->data_termino;
    }

}
