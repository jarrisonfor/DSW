@extends('layouts.general')

@section('contenido')
    <h1>
        Insertar
    </h1>
    <form class="ui form" action="{{ route('alumno.store') }}" method="POST">
        @csrf
        <div class="field">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre">
        </div>

        <div class="field">
            <label>Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>

        <div class="field">
            <label>Email</label>
            <input type="text" name="email" placeholder="Email">
        </div>
        <div class="field">
            <label>Fecha de nacimiento</label>
            <input type="text" name="f_nacimiento" placeholder="Fecha de nacimiento">
        </div>
        <div class="field">
            <label>Codigo postal</label>
            <input type="text" name="c_postal" placeholder="Codigo postal">
        </div>
        <div class="field">
            <label>Codigo</label>
            <input type="text" name="codigo" placeholder="Codigo">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
