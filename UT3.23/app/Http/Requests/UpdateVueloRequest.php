<?php

namespace App\Http\Requests;

use App\Rules\DNI;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVueloRequest extends FormRequest
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
            'codigo' => 'required|string|size:10',
            'origen' => 'required|string|different:destino|min:5|max:50',
            'destino' => 'required|string|different:origen|min:5|max:50',
            'fecha' => 'required|date|after:now',
            'hora' => 'required|string',
            'dni' => ['required', 'string', 'size:9', 'exists:pilotos', new DNI()],
        ];
    }
}
