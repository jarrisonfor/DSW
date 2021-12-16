<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DNI implements Rule
{
    public function passes($attribute, $value)
    {
        $letra = substr($value, -1);
        $numeros = substr($value, 0, -1);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
          return true;
        }else{
          return false;
        }
    }
    public function message()
    {
        return 'El DNI proporcionado es incorrecto.';
    }
}
