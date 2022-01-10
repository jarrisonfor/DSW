<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validateCif implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if (!preg_match('/^[ABCDEFGHJNPQRSUVW][0-9]{7}[0-9A-J]$/', $value)) {
            return false;
        }

        $cif_codes = 'JABCDEFGHI';

        $sum = (string) $this->getCifSum($value);
        $n = (10 - substr($sum, -1)) % 10;

        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $value)) {
            if (in_array($value[0], array('A', 'B', 'E', 'H'))) {
                // Numerico
                return ((int)$value[8] === $n);
            } elseif (in_array($value[0], array('K', 'P', 'Q', 'S'))) {
                // Letras
                return ((int)$value[8] === $cif_codes[$n]);
            } else {
                // Alfanumérico
                if (is_numeric((int)$value[8])) {
                    return ((int)$value[8] === $n);
                } else {
                    return ((int)$value[8] === $cif_codes[$n]);
                }
            }
        }

        return false;
    }

    public function getCifSum($cif)
    {
        $sum = $cif[2] + $cif[4] + $cif[6];

        for ($i = 1; $i < 8; $i += 2) {
            $tmp = (string) (2 * $cif[$i]);

            $tmp = $tmp[0] + ((strlen($tmp) === 2) ? $tmp[1] : 0);

            $sum += $tmp;
        }

        return $sum;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El formato CIF no es correcto';
    }

}
