<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'f_nacimiento' => 'date'
    ];

    protected $fillable = [
        'nombre',
        'apellidos',
        'f_nacimiento',
        'email',
        'dni',
        'telefono',
    ];

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class);
    }

    public function getEdadAttribute()
    {
        return $this->f_nacimiento->age;
    }

}
