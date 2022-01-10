<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users',
            'alias' => 'sometimes|required|string|min:1|max:2|unique:users',
            'password' => 'sometimes|required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre debe tener como máximo 255 caracteres',
            'email.required' => 'El email es requerido',
            'email.string' => 'El email debe ser una cadena de texto',
            'email.email' => 'El email debe ser un email válido',
            'email.max' => 'El email debe tener como máximo 255 caracteres',
            'email.unique' => 'El email ya existe',
            'alias.required' => 'El alias es requerido',
            'alias.string' => 'El alias debe ser una cadena de texto',
            'alias.max' => 'El alias debe tener como minimo 1 caracter',
            'alias.max' => 'El alias debe tener como máximo 2 caracteres',
            'alias.unique' => 'El alias ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.min' => 'La contraseña debe tener como mínimo 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }

}
