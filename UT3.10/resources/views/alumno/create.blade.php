@extends('layouts.general')

@section('contenido')
    <h1>
        Insertar
    </h1>
    <form class="ui form" action="{{ route('alumno.store') }}" method="POST">
        @csrf
        <div class="field">
            <label>nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
        </div>

        <div class="field">
            <label>apellidos</label>
            <input type="text" name="apellidos" placeholder="apellidos">
        </div>

        <div class="field">
            <label>email</label>
            <input type="text" name="email" placeholder="email">
        </div>
        <div class="field">
            <label>f_nacimiento</label>
            <input type="text" name="f_nacimiento" placeholder="f_nacimiento">
        </div>
        <div class="field">
            <label>c_postal</label>
            <input type="text" name="c_postal" placeholder="c_postal">
        </div>
        <div class="field">
            <label>codigo</label>
            <input type="text" name="codigo" placeholder="codigo">
        </div>
        <button type="submit" id="insertar" class="ui button primary green">
            <i class="icon save"></i>
            Guardar
        </button>
    </form>
@endsection
