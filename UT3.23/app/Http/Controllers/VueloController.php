<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVueloRequest;
use App\Http\Requests\UpdateVueloRequest;
use App\Models\Piloto;
use App\Models\Vuelo;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = Vuelo::all();
        return view("vuelo.index", ["vuelos" => $vuelos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("vuelo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVueloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVueloRequest $request)
    {
        $piloto = Piloto::where('dni', $request->dni)->first();
        $vuelo = new Vuelo();
        $vuelo->fill($request->all());
        $vuelo->piloto_id = $piloto->id;
        $vuelo->save();
        return redirect('vuelo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
        return view("vuelo.show", ['vuelo' => $vuelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vuelo $vuelo)
    {
        return view("vuelo.edit", ['vuelo' => $vuelo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVueloRequest  $request
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVueloRequest $request, Vuelo $vuelo)
    {
        $piloto = Piloto::where('dni', $request->dni)->first();
        $vuelo->fill($request->all());
        $vuelo->piloto_id = $piloto->id;
        $vuelo->save();
        return redirect('vuelo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();
        return redirect('vuelo');
    }
}
