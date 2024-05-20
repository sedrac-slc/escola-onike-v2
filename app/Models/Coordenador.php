<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'curso_id',
        'created_by',
        'updated_by',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }


}
