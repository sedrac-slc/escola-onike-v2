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
        'formacao',
        'created_by',
        'updated_by',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function leciona(){
        return $this->belongsToMany(TurmaDisciplinaHorario::class, ProfessorLeciona::TABLE);
    }

}
