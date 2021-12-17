<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePilotoRequest;
use App\Http\Requests\UpdatePilotoRequest;
use App\Models\Piloto;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilotos = Piloto::all();
        return view("piloto.index", ["pilotos" => $pilotos]);
    }

    public function show(Piloto $piloto)
    {
        return view("piloto.show", ['piloto' => $piloto]);
    }

}
