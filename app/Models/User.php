<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enum\FuncaoEnum;
use App\Enum\GeneroEnum;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'genero',
        'data_nascimento',
        'bilhete_identidade',
        'is_validado',
        'funcao',
        'image',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function aluno(){
        return $this->hasOne(Aluno::class);
    }

    public function professor(){
        return $this->hasOne(Professor::class);
    }

    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }

    public function coordenador(){
        return $this->hasOne(Coordenador::class);
    }

    function genero() : string{
        return GeneroEnum::genero($this->genero);
    }

    function funcao() : string{
        return FuncaoEnum::funcao($this->funcao);
    }

    function abreviarNome() : string{
        $array = explode(" ",$this->name);
        $tam = sizeof($array);
        return $array[0][0].'.'.$array[$tam-1];
    }

    function isCoordenador(): bool { return $this->funcao == FuncaoEnum::COORDENADOR_CURSO;}

    function isDirector(): bool { return $this->funcao == FuncaoEnum::DIRECTOR_GERAL;}

    function isSecretario(): bool { return $this->funcao == FuncaoEnum::SECRETARIO;}

    function isProfessor(): bool { return $this->funcao == FuncaoEnum::PROFESSOR;}

    function isAluno(): bool { return $this->funcao == FuncaoEnum::ALUNO;}

    function isDirectorOrSecretario(){ return $this->isDirector() || $this->isSecretario(); }

    function isCoordenadorOrProfessor(){ return $this->isCoordenador() || $this->isProfessor(); }

}
