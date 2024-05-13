<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'dia_semana'=> ['required','string'],
            'turma_id'=> ['required','string'],
            'hora_inicio'=> ['required'],
            'hora_termino'=> ['required'],
        ];
    }
}
