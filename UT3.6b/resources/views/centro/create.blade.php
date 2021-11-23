@extends('layouts.general')

@section('contenido')
    <h1>
        Insertar
    </h1>
    <form class="ui form" action="{{ route('centro.store') }}" method="POST">
        @csrf
        <div class="field">
            <label>codigo</label>
            <input type="text" name="codigo" placeholder="codigo">
        </div>

        <div class="field">
            <label>denominacion</label>
            <input type="text" name="denominacion" placeholder="denominacion">
        </div>

        <div class="field">
            <label>municipio</label>
            <input type="text" name="municipio" placeholder="municipio">
        </div>
        <div class="field">
            <label>ciudad</label>
            <input type="text" name="ciudad" placeholder="ciudad">
        </div>
        <div class="field">
            <label>isla</label>
            <select name="isla">
                <option value='Lanzarote'>Lanzarote</option>
                <option value='Fuerteventura'>Fuerteventura</option>
                <option value='Gran Canaria'>Gran Canaria</option>
                <option value='La Palma'>La Palma</option>
                <option value='El Hierro'>El Hierro</option>
                <option value='Tenerife'>Tenerife</option>
                <option value='La Gomera'>La Gomera</option>
            </select>
        </div>
        <div class="field">
            <label>codigoPostal</label>
            <input type="text" name="codigoPostal" placeholder="codigoPostal">
        </div>
        <div class="field">
            <label>provincia</label>
            <input type="text" name="provincia" placeholder="provincia">
        </div>
        <div class="field">
            <label>latitud</label>
            <input type="text" name="latitud" placeholder="latitud">
        </div>
        <div class="field">
            <label>longitud</label>
            <input type="text" name="longitud" placeholder="longitud">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
