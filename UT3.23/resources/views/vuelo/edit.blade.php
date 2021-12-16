@extends('layouts.app1')

@section('contenido')
    <h1>
        Editar
    </h1>
    <form class="ui form" action="{{ route('vuelo.update', $vuelo->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label class="form-label">Codigo</label>
            <input class="form-control" type="text" name="codigo" placeholder="Codigo" value="{{ $vuelo->codigo }}">
        </div>

        <div>
            <label class="form-label">Origen</label>
            <input class="form-control" type="text" name="origen" placeholder="Origen" value="{{ $vuelo->origen }}">
        </div>

        <div>
            <label class="form-label">Destino</label>
            <input class="form-control" type="text" name="destino" placeholder="Destino" value="{{ $vuelo->destino }}">
        </div>
        <div>
            <label class="form-label">Fecha</label>
            <input class="form-control" type="text" name="fecha" placeholder="Fecha" value="{{ $vuelo->fecha->toDateString() }}">
        </div>
        <div>
            <label class="form-label">Hora</label>
            <input class="form-control" type="text" name="hora" placeholder="Hora" value="{{ $vuelo->hora }}">
        </div>
        <div>
            <label class="form-label">DNI</label>
            <input class="form-control" type="text" name="dni" placeholder="DNI" value="{{ $vuelo->piloto->dni }}">
        </div>
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </form>
@endsection
