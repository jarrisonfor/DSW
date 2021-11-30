@extends('layouts.general')

@section('contenido')
    <h1>
        Editar
    </h1>
    <form class="ui form" action="{{ route('alumno.update', $alumno->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="field">
            <label>nombre</label>
            <input type="text" name="nombre" placeholder="nombre" value="{{ $alumno->nombre }}">
        </div>
        <div class="field">
            <label>apellidos</label>
            <input type="text" name="apellidos" placeholder="apellidos" value="{{ $alumno->apellidos }}">
        </div>
        <div class="field">
            <label>email</label>
            <input type="text" name="email" placeholder="email" value="{{ $alumno->email }}">
        </div>
        <div class="field">
            <label>f_nacimiento</label>
            <input type="text" name="f_nacimiento" placeholder="f_nacimiento" value="{{ $alumno->f_nacimiento }}">
        </div>
        <div class="field">
            <label>c_postal</label>
            <input type="text" name="c_postal" placeholder="c_postal" value="{{ $alumno->c_postal }}">
        </div>
        <div class="field">
            <label>codigo</label>
            <input type="text" name="codigo" placeholder="codigo" value="{{ $alumno->codigo }}">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
