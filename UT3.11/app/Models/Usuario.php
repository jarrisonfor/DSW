<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'f_nacimiento' => 'date',
    ];

    public $timestamps = false;

    public function publicacion()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function getEdadAttribute()
    {
        return $this->f_nacimiento->age;
    }

}
