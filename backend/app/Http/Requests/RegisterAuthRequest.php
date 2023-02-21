<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10'
        ];
    }

    public function messages()
    {   return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre solo puede contener letras',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo debe contener un email válido',
            'email.unique' => 'El email ya se encuentra en uso',
            'password.required' => 'El campo password es requerido',
            'password.min' => 'El campo password debe tener mínimo 6 caracteres',
            'password.max' => 'El campo password no debe tener más de 10 caracteres.',

        ];
    }

}
