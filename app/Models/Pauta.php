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

    public function text(){
        return "[MT1=".$this->mt1.", MT2=".$this->mt2.', MT3='.$this->mt3.', MFD='.$this->mfd.', EXAME='.$this->exame.', MF='.$this->mf.']';
    }

}
