@extends('layouts.general')

@section('contenido')
    <h1>
        Mostrar
    </h1>

    <table class="ui celled table">
        <thead>
            <tr>
                <th class="center aligned">id</th>
                <th class="center aligned">nombre</th>
                <th class="center aligned">apellidos</th>
                <th class="center aligned">email</th>
                <th class="center aligned">f_nacimiento</th>
                <th class="center aligned">c_postal</th>
                <th class="center aligned">codigo</th>
                <th class="center aligned">lng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center aligned">{{ $alumno->id }}</td>
                <td class="center aligned">{{ $alumno->nombre }}</td>
                <td class="center aligned">{{ $alumno->apellidos }}</td>
                <td class="center aligned">{{ $alumno->email }}</td>
                <td class="center aligned">{{ $alumno->f_nacimiento }}</td>
                <td class="center aligned">{{ $alumno->c_postal }}</td>
                <td class="center aligned">{{ $alumno->codigo }}</td>
            </tr>
        </tbody>
    </table>

@endsection
