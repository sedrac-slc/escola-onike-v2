<?php

namespace App\Validator;

use App\Models\User;
use DateTime;

class TrimestreValidator{


    private static function data($data)
    {
        if (!isset($data['data_inicio']))  return false;
        if (!isset($data['data_termino']))  return false;

        $data_inicio = new DateTime($data['data_inicio']);
        $data_termino = new DateTime($data['data_termino']);

        if ($data_inicio > $data_termino) {
            toastr()->warning("A data de inicio não pode ser maior que a data de termino.");
            return false;
        }
        return true;
    }

}
