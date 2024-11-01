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
        'concat_fields',
    ];

    function concatFields(){
        $concat = "";
        $user = $this->user();
        if(isset($user->id)) $concat += $user->concat_fields;
        return $concat;
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
