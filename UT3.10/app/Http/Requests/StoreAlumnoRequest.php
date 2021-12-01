<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
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
            'nombre' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:alumnos',
            'f_nacimiento' => 'required|date',
            'c_postal' => 'required|numeric|min:1000|max:52999',
            'codigo' => 'required|regex:/[0-9]{4}-[A-Z]/|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.string' => 'El nombre debe ser una cadena de texto',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto',
            'apellidos.min' => 'Los apellidos deben tener al menos 3 caracteres',
            'apellidos.max' => 'Los apellidos no pueden tener más de 255 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.string' => 'El email debe ser una cadena de texto',
            'email.email' => 'El email debe ser un email válido',
            'email.max' => 'El email no puede tener más de 255 caracteres',
            'email.unique' => 'El email ya existe',
            'f_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'f_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'c_postal.required' => 'El código postal es obligatorio',
            'c_postal.numeric' => 'El código postal debe ser un número',
            'c_postal.min' => 'El código postal debe tener al menos 3 caracteres',
            'c_postal.max' => 'El código postal no puede tener más de 255 caracteres',
            'codigo.required' => 'El código es obligatorio',
            'codigo.regex' => 'El código debe tener el formato XXXX-X',
            'codigo.string' => 'El código debe ser una cadena de texto',
            'codigo.max' => 'El código no puede tener más de 255 caracteres',
        ];
    }
}
