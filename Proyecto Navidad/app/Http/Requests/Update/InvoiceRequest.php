<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'client' => ['required'],
            'products' => ['required', 'array'],
            'products.*.invoiceQuantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'client.required' => 'Debe seleccionar un cliente.',
            'products.required' => 'Debes seleccionar al menos un producto.',
            'products.*.invoiceQuantity.min' => 'La cantidad debe ser mayor a 0.',
            'products.*.invoiceQuantity.required' => 'Debes seleccionar la cantidad de productos.',
            'products.*.invoiceQuantity.integer' => 'La cantidad debe ser un número entero.',
        ];
    }

}
