@extends('layouts.general')

@section('contenido')
    <h1>
        Insertar
    </h1>
    <form class="ui form" action="{{ route('proveedor.store') }}" method="POST">
        @csrf
        <div class="field">
            <label>empresa</label>
            <input type="text" name="nombreCompañía" placeholder="empresa">
        </div>

        <div class="field">
            <label>Contacto</label>
            <input type="text" name="nombreContacto" placeholder="NombreContacto">
        </div>

        <div class="field">
            <label>direccion</label>
            <input type="text" name="dirección" placeholder="direccion">
        </div>
        <div class="field">
            <label>ciudad</label>
            <input type="text" name="ciudad" placeholder="ciudad">
        </div>
        <div class="field">
            <label>pais</label>
            <input type="text" name="país" placeholder="pais">
        </div>
        <div class="field">
            <label>lat</label>
            <input type="text" name="latitud" placeholder="lat">
        </div>
        <div class="field">
            <label>lng</label>
            <input type="text" name="longitud" placeholder="lng">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
