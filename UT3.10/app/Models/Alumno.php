<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $casts = [
        'f_nacimiento' => 'date',
    ];

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'f_nacimiento',
        'c_postal',
        'codigo',
    ];

    public function getMesAttribute()
    {
        $months = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];
        return $months[$this->f_nacimiento->month];
    }
}
