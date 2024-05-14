<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PautaRequest extends FormRequest
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
            'mt1' => ['required'],
            'mt2' => ['required'],
            'mt3' => ['required'],
            'mfd' => ['required'],
            'exame' => ['required'],
            'mf' => ['required'],
        ];
    }
}
