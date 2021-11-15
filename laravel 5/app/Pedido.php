<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'UT5_7';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
