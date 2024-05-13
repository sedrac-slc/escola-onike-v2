<?php

namespace App\Validator;

use App\Models\User;

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

    public static function storeRequest($data) : bool {
        if(static::emailExist($data)) return false;
        if(static::bilheteIdentidadeExist($data)) return false;
        if(!isset($data['password'],$data['password_confirmation'])){
            toastr()->warning("Informa a paalavra-passe, a sua confirmação");
            return false;
        }
        if($data['password'] != $data['password_confirmation']){
            toastr()->warning("As palavras passes não são iguais");
            return false;
        }
        return true;
    }

    public static function updateRequest(&$data, $id) : bool {
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
