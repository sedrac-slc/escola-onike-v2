<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trimestre extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'data_inicio',
        'data_termino',
        'created_by',
        'updated_by',
    ];

}