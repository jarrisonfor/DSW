<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasaje extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidos',
        'precio',
    ];

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class);
    }

}
