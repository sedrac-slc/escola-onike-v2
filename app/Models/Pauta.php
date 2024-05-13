<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pauta extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'mt1',
        'mt2',
        'mt3',
        'mfd',
        'exame',
        'mf',
        'created_by',
        'updated_by',
    ];

}
