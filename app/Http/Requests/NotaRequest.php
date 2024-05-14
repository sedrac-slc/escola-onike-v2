<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'aluno_id' => ['required'],
            'pauta_id' => ['required'],
            'trimestre_id' => ['required'],
            'disciplina_id' => ['required'],
            'mac' => ['required'],
            'npp' => ['required'],
            'npt' => ['required'],
        ];
    }
}
