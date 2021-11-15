<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UT5_2Request extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NombreCompañía' => 'required|min:3',
            'Latitud' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'Longitud' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ];
    }
}
