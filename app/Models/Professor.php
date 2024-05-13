<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'created_by',
        'updated_by',
    ];

    public function horarios(){
        return $this->belongsToMany(Horario::class);
    }

}
