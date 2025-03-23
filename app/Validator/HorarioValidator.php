<?php

namespace App\Validator;

use App\Models\User;
use DateTime;

class HorarioValidator{

    public static function data($data)
    {
        if (!isset($data['hora_inicio'])){ dd("uirr"); return false; }
        if (!isset($data['hora_termino'])){ dd("rr"); return false; }

        $data_inicio = new DateTime($data['hora_inicio']);
        $data_termino = new DateTime($data['hora_termino']);

        if ($data_inicio > $data_termino) {
            dd("saas");
            toastr()->warning("A data de inicio não pode ser maior que a data de termino.");
            return false;
        }
        return true;
    }

}
