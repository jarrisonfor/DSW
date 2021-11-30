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
}
