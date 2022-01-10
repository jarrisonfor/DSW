<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255',],
            'description' => ['string', 'max:255'],
            'tax' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre debe tener como máximo 255 caracteres',
            'description.string' => 'La descripción debe ser una cadena de texto',
            'description.max' => 'La descripción debe tener como máximo 255 caracteres',
            'tax.required' => 'El impuesto es requerido',
            'tax.numeric' => 'El impuesto debe ser un número',
            'tax.min' => 'El impuesto debe ser mayor o igual a 0',
            'tax.max' => 'El impuesto debe ser menor o igual a 100',
        ];
    }

}
