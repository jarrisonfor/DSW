<?php

namespace App\Http\Requests\Update;

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
