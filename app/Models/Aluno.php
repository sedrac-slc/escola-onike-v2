<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'classe_id',
        'created_by',
        'updated_by',
    ];

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
