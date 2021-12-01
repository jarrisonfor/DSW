@extends('layouts.general')

@section('contenido')
    <h1>
        Editar
    </h1>
    <form class="ui form" action="{{ route('alumno.update', $alumno->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="field">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{ $alumno->nombre }}">
        </div>
        <div class="field">
            <label>Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos" value="{{ $alumno->apellidos }}">
        </div>
        <div class="field">
            <label>Email</label>
            <input type="text" name="email" placeholder="Email" value="{{ $alumno->email }}">
        </div>
        <div class="field">
            <label>Fecha de Nacimiento</label>
            <input type="text" name="f_nacimiento" placeholder="Fecha de Nacimiento" value="{{ $alumno->f_nacimiento }}">
        </div>
        <div class="field">
            <label>Codigo postal</label>
            <input type="text" name="c_postal" placeholder="Codigo postal" value="{{ $alumno->c_postal }}">
        </div>
        <div class="field">
            <label>Codigo</label>
            <input type="text" name="codigo" placeholder="Codigo" value="{{ $alumno->codigo }}">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
