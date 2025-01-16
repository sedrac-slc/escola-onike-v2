<?php

namespace App\Validator;

use App\Models\User;
use DateTime;

class UserValidator{

    private static function emailExist($data){
        if(User::where('email',$data['email'])->exists()){
            toastr()->warning("Email já existe no sistema, não é permitido que outro usuário cadastra");
            return true;
        }
        return false;
    }

    private static function bilheteIdentidadeExist($data){
        if(User::where('bilhete_identidade',$data['bilhete_identidade'])->exists()){
            toastr()->warning("Bilhete de identidade já existe no sistema, não é permitido que outro usuário cadastra");
            return true;
        }
        return false;
    }

    private static function dataNascimentoMinimo($data)
    {
        if (!isset($data['data_nascimento']))  return false;

        $dataNascimento = new DateTime($data['data_nascimento']);
        $dataAtual = new DateTime();

        if ($dataNascimento > $dataAtual) {
            toastr()->warning("A data de nascimento não pode ser maior que a data atual.");
            return false;
        }

        $idade = $dataNascimento->diff($dataAtual)->y;

        if($idade >= 5)  return true;

        toastr()->warning("Informa pela data de nascimento o utilizador não tem a idade mínina (5 anos) aceite");
        return false;
    }

    public static function storeRequest($data) : bool {

        if(!static::dataNascimentoMinimo($data)) return false;
        if(static::emailExist($data)) return false;
        if(static::bilheteIdentidadeExist($data)) return false;

        if(!isset($data['password'],$data['password_confirmation'])){
            toastr()->warning("Informa a palavra-passe, a sua confirmação");
            return false;
        }
        if($data['password'] != $data['password_confirmation']){
            toastr()->warning("As palavras passes não são iguais");
            return false;
        }
        return true;
    }

    public static function updateRequest(&$data, $id) : bool {

        if(!static::dataNascimentoMinimo($data)) return false;

        $user = User::find($id);

        if($user->email == $data['email']){
            unset($data['email']);
        }else{
            if(static::emailExist($data)) return false;
        }

        if($user->bilhete_identidade == $data['bilhete_identidade']){
            unset($data['bilhete_identidade']);
        }else{
            if(static::bilheteIdentidadeExist($data)) return false;
        }

        unset($data['password']);

        return true;
    }

}
