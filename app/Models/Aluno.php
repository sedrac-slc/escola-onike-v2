<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'created_by',
        'updated_by',
    ];

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
