@extends('layouts.general')

@section('contenido')
<h1>
	Insertar
</h1>
<form class="ui form" action="{{url('UT5_2')}}" method="POST">
    @csrf
    <div class="field">
        <label>empresa</label>
        <input type="text" name="NombreCompañía" placeholder="empresa">
    </div>
	
	<div class="field">
        <label>Contacto</label>
        <input type="text" name="NombreContacto" placeholder="NombreContacto">
    </div>
	
    <div class="field">
        <label>direccion</label>
        <input type="text" name="Dirección" placeholder="direccion">
    </div>
    <div class="field">
        <label>ciudad</label>
        <input type="text" name="Ciudad" placeholder="ciudad">
    </div>
    <div class="field">
        <label>pais</label>
        <input type="text" name="País" placeholder="pais">
    </div>
    <div class="field">
        <label>lat</label>
        <input type="text" name="Latitud" placeholder="lat">
    </div>
    <div class="field">
        <label>lng</label>
        <input type="text" name="Longitud" placeholder="lng">
    </div>
    <button type="submit" id="insertar" class="ui button primary green">
        <i class="icon save"></i>
        Guardar
    </button>
</form>
@endsection