@extends('layouts.general')

@section('contenido')
    <h1>
        Editar
    </h1>
    <form class="ui form" action="{{ route('centro.update', $centro->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="field">
            <label>codigo</label>
            <input type="text" name="codigo" placeholder="codigo" value="{{ $centro->codigo }}">
        </div>

        <div class="field">
            <label>denominacion</label>
            <input type="text" name="denominacion" placeholder="denominacion" value="{{ $centro->denominacion }}">
        </div>

        <div class="field">
            <label>municipio</label>
            <input type="text" name="municipio" placeholder="municipio" value="{{ $centro->municipio }}">
        </div>
        <div class="field">
            <label>ciudad</label>
            <input type="text" name="ciudad" placeholder="ciudad" value="{{ $centro->ciudad }}">
        </div>
        <div class="field">
            <label>isla</label>
            <select name="isla">
                <option value='Lanzarote' {{ $centro->isla == 'Lanzarote' ? 'selected' : '' }}>Lanzarote</option>
                <option value='Fuerteventura' {{ $centro->isla == 'Fuerteventura' ? 'selected' : '' }}>Fuerteventura</option>
                <option value='Gran Canaria' {{ $centro->isla == 'Gran Canaria' ? 'selected' : '' }}>Gran Canaria</option>
                <option value='La Palma' {{ $centro->isla == 'La Palma' ? 'selected' : '' }}>La Palma</option>
                <option value='El Hierro' {{ $centro->isla == 'El Hierro' ? 'selected' : '' }}>El Hierro</option>
                <option value='Tenerife' {{ $centro->isla == 'Tenerife' ? 'selected' : '' }}>Tenerife</option>
                <option value='La Gomera' {{ $centro->isla == 'La Gomera' ? 'selected' : '' }}>La Gomera</option>
            </select>
        </div>
        <div class="field">
            <label>codigoPostal</label>
            <input type="text" name="codigoPostal" placeholder="codigoPostal" value="{{ $centro->codigoPostal }}">
        </div>
        <div class="field">
            <label>provincia</label>
            <input type="text" name="provincia" placeholder="provincia" value="{{ $centro->provincia }}">
        </div>
        <div class="field">
            <label>latitud</label>
            <input type="text" name="latitud" placeholder="latitud" value="{{ $centro->latitud }}">
        </div>
        <div class="field">
            <label>longitud</label>
            <input type="text" name="longitud" placeholder="longitud" value="{{ $centro->longitud }}">
        </div>
    </form>
@endsection
