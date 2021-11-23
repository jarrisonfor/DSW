<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CentroRequest extends FormRequest
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
            'codigo' => ['required', 'integer'],
            'denominacion' => ['string', 'min:5', 'max:30'],
            'ciudad' => ['required', 'string', 'min:10'],
            'isla' => [Rule::in([
                'Lanzarote',
                'Fuerteventura',
                'Gran Canaria',
                'La Palma',
                'El Hierro',
                'Tenerife',
                'La Gomera',
            ])],
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El código es obligatorio',
            'codigo.integer' => 'El código debe ser un número entero',
            'denominacion.string' => 'La denominación debe ser una cadena de caracteres',
            'denominacion.min' => 'La denominación debe tener al menos 5 caracteres',
            'denominacion.max' => 'La denominación debe tener como máximo 30 caracteres',
            'ciudad.required' => 'La ciudad es obligatoria',
            'ciudad.string' => 'La ciudad debe ser una cadena de caracteres',
            'ciudad.min' => 'La ciudad debe tener al menos 10 caracteres',
            'isla.in' => 'La isla debe ser Lanzarote, Fuerteventura, Gran Canaria, La Palma, El Hierro, Tenerife, La Gomera',
        ];
    }

}
