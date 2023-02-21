<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class getSearchRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'integer'
        ];
    }

    public function messages()
    {   return [
            'id.integer' => 'El campo id debe ser un numero entero'

        ];
    }
}
