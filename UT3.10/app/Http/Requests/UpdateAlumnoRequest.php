<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
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
            'nombre' => 'string|min:3|max:255',
            'apellidos' => 'string|min:3|max:255',
            'email' => 'sometimes|string|email|max:255',
            'f_nacimiento' => 'date',
            'c_postal' => 'numeric|min:1000|max:52999',
            'codigo' => 'regex:/[0-9]{4}-[A-Z]/|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nombre.string' => 'El nombre debe ser una cadena de caracteres',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres',
            'apellidos.string' => 'Los apellidos deben ser una cadena de caracteres',
            'apellidos.min' => 'Los apellidos deben tener al menos 3 caracteres',
            'apellidos.max' => 'Los apellidos no pueden tener más de 255 caracteres',
            'email.string' => 'El email debe ser una cadena de caracteres',
            'email.email' => 'El email debe ser un email válido',
            'email.max' => 'El email no puede tener más de 255 caracteres',
            'f_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'c_postal.numeric' => 'El código postal debe ser un número',
            'c_postal.min' => 'El código postal debe tener al menos 3 caracteres',
            'c_postal.max' => 'El código postal no puede tener más de 255 caracteres',
            'codigo.regex' => 'El código debe tener el formato NNNN-X',
            'codigo.string' => 'El código debe ser una cadena de caracteres',
            'codigo.max' => 'El código no puede tener más de 255 caracteres',
        ];
    }
}
