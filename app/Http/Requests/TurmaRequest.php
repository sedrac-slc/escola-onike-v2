<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
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
            'ano_lectivo' => ['nullable','string'],
            'classe_id' => ['required','string'],
            'curso_id' => ['required','string'],
            'periodo' => ['required','string','regex:/[MANHA|TARDE|NOITE]/i'],
            'sala' => ['required','string'],
        ];
    }
}
