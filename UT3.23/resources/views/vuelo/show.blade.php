@extends('layouts.app1')

@section('contenido')
    <h1>
        Mostrar
    </h1>

    <table class="table w-100">
        <thead>
            <tr>
                <th>Id</th>
                <th>Codigo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $vuelo->id }}</td>
                <td>{{ $vuelo->codigo }}</td>
                <td>{{ $vuelo->origen }}</td>
                <td>{{ $vuelo->destino }}</td>
                <td>{{ $vuelo->fecha->toDateString() }}</td>
                <td>{{ $vuelo->hora }}</td>
            </tr>
        </tbody>
    </table>

@endsection
