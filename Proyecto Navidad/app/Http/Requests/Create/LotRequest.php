<?php

namespace App\Http\Requests\Create;

use Illuminate\Foundation\Http\FormRequest;

class LotRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:lots',
            'product_id' => 'required|integer',
            'expirationDate' => 'required|date',
            'deliveryDate' => 'required|date',
            'quantity' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del lote es requerido',
            'name.string' => 'El nombre del lote debe ser una cadena de texto',
            'name.max' => 'El nombre del lote no debe exceder los 255 caracteres',
            'name.unique' => 'El nombre del lote ya existe',
            'product_id.required' => 'El producto es requerido',
            'product_id.integer' => 'El producto debe ser un número entero',
            'expirationDate.required' => 'La fecha de caducidad es requerida',
            'expirationDate.date' => 'La fecha de caducidad debe ser una fecha válida',
            'deliveryDate.required' => 'La fecha de entrega es requerida',
            'deliveryDate.date' => 'La fecha de entrega debe ser una fecha válida',
            'quantity.required' => 'La cantidad es requerida',
            'quantity.integer' => 'La cantidad debe ser un número entero',
        ];
    }

}
