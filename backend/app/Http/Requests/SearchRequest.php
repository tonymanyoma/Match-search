<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'name' => 'required|string',
            'percent' => 'required',
        ];
    }

    public function messages()
    {   return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre solo puede contener letras',
            'percent.required' => 'El campo email es requerido'

        ];
    }
}
