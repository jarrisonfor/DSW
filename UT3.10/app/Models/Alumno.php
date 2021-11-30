<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $cast = [
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
}
