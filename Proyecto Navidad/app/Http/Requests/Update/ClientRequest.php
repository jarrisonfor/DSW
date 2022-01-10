<?php

namespace App\Http\Requests\Update;

use App\Rules\validateCif;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'companyName' => ['sometimes', 'required', 'string', 'max:255'],
            'identification' => ['sometimes', 'string', 'max:255', new validateCif()],
            'name' => ['sometimes', 'required', 'string', 'max:100', 'unique:clients'],
            'phone' => ['nullable', 'string', 'max:17'],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'postalCode' => ['sometimes', 'required', 'integer', 'min:1000', 'max:52999'],
            'municipality' => ['sometimes', 'required', 'string', 'max:255'],
            'province' => ['sometimes', 'required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'companyName.required' => 'El campo "Razon social" es obligatorio.',
            'companyName.string' => 'El campo "Razon social" debe ser un texto.',
            'companyName.max' => 'El campo "Razon social" debe tener como máximo 255 caracteres.',
            'identification.required' => 'El campo "CIF" es obligatorio.',
            'identification.string' => 'El campo "CIF" debe ser un texto.',
            'identification.max' => 'El campo "CIF" debe tener como máximo 255 caracteres.',
            'name.required' => 'El campo "Nombre" es obligatorio.',
            'name.string' => 'El campo "Nombre" debe ser un texto.',
            'name.max' => 'El campo "Nombre" debe tener como máximo 100 caracteres.',
            'name.unique' => 'El campo Establecimiento ya existe.',
            'phone.string' => 'El campo "Teléfono" debe ser un texto.',
            'phone.max' => 'El campo "Teléfono" debe tener como máximo 17 caracteres.',
            'address.required' => 'El campo "Calle" es obligatorio.',
            'address.string' => 'El campo "Calle" debe ser un texto.',
            'address.max' => 'El campo "Calle" debe tener como máximo 255 caracteres.',
            'postalCode.required' => 'El campo "Código postal" es obligatorio.',
            'postalCode.integer' => 'El campo "Código postal" debe ser un número entero.',
            'postalCode.min' => 'El campo "Código postal" debe tener como mínimo 1000.',
            'postalCode.max' => 'El campo "Código postal" debe tener como máximo 52999.',
            'municipality.required' => 'El campo "Poblacion" es obligatorio.',
            'municipality.string' => 'El campo "Poblacion" debe ser un texto.',
            'municipality.max' => 'El campo "Poblacion" debe tener como máximo 255 caracteres.',
            'province.required' => 'El campo "Provincia" es obligatorio.',
            'province.string' => 'El campo "Provincia" debe ser un texto.',
            'province.max' => 'El campo "Provincia" debe tener como máximo 255 caracteres.',
        ];
    }

}
