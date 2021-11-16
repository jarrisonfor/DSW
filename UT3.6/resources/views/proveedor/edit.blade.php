@extends('layouts.general')

@section('contenido')
    <h1>
        Editar
    </h1>
    <form class="ui form" action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="field">
            <label>empresa</label>
            <input type="text" name="nombreCompañía" placeholder="empresa" value="{{ $proveedor->nombreCompañía }}">
        </div>
        <div class="field">
            <label>Contacto</label>
            <input type="text" name="nombreContacto" placeholder="NombreContacto" value="{{ $proveedor->nombreContacto }}">
        </div>
        <div class="field">
            <label>direccion</label>
            <input type="text" name="dirección" placeholder="direccion" value="{{ $proveedor->dirección }}">
        </div>
        <div class="field">
            <label>ciudad</label>
            <input type="text" name="ciudad" placeholder="ciudad" value="{{ $proveedor->ciudad }}">
        </div>
        <div class="field">
            <label>pais</label>
            <input type="text" name="país" placeholder="pais" value="{{ $proveedor->país }}">
        </div>
        <div class="field">
            <label>lat</label>
            <input type="text" name="latitud" placeholder="lat" value="{{ $proveedor->latitud }}">
        </div>
        <div class="field">
            <label>lng</label>
            <input type="text" name="longitud" placeholder="lng" value="{{ $proveedor->longitud }}">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
