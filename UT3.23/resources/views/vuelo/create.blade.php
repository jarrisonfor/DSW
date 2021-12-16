@extends('layouts.app1')

@section('contenido')
    <h1>
        Insertar
    </h1>
    <form action="{{ route('vuelo.store') }}" method="POST">
        @csrf
        <div>
            <label class="form-label">Codigo</label>
            <input class="form-control" type="text" name="codigo" placeholder="codigo">
        </div>

        <div>
            <label class="form-label">Origen</label>
            <input class="form-control" type="text" name="origen" placeholder="Origen">
        </div>

        <div>
            <label class="form-label">Destino</label>
            <input class="form-control" type="text" name="destino" placeholder="Destino">
        </div>
        <div>
            <label class="form-label">Fecha</label>
            <input class="form-control" type="text" name="fecha" placeholder="Fecha">
        </div>
        <div>
            <label class="form-label">Hora</label>
            <input class="form-control" type="text" name="hora" placeholder="Hora">
        </div>
        <div>
            <label class="form-label">DNI</label>
            <input class="form-control" type="text" name="dni" placeholder="DNI">
        </div>
        <br>
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </form>
@endsection
