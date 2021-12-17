<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasajeRequest;
use App\Http\Requests\UpdatePasajeRequest;
use App\Models\Pasaje;

class PasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasajes = Pasaje::all();
        return view("pasaje.index", ["pasajes" => $pasajes]);
    }

    public function sumar(Pasaje $pasaje)
    {
        $pasaje->precio += 1;
        $pasaje->save();
        return $this->index();
    }
    
    public function restar(Pasaje $pasaje)
    {
        $pasaje->precio -= 1;
        $pasaje->save();
        return $this->index();
    }

}
