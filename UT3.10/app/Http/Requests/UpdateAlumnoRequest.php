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
            'email' => 'string|email|max:255|unique:alumnos',
            'f_nacimiento' => 'date',
            'c_postal' => 'string|min:1000|max:52999',
            'codigo' => 'regex:/[0-9]{4}-[A-Z]/|string|max:255',
        ];
    }
}
