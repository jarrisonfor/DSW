@extends('layouts.general') @section('contenido')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <style>
        nav {
            display: inline-block;
        }

        .cabecera {
            display: flex;
            justify-content: space-between;
        }

    </style>
    <div class='cabecera' style="margin-bottom: 20px">
        <a href="{{ route('centro.create') }}">
            <button id="insertar" class="ui button primary green">
                <i class="icon add"></i>
                Insertar
            </button>
        </a>
    </div>
    <table class="ui celled table" id="centros">
        <thead>
            <tr>
                <th class="center aligned">Codigo</th>
                <th class="center aligned">Denominacion</th>
                <th class="center aligned">Ciudad</th>
                <th class="center aligned">Isla</th>
                <th class="center aligned">Longitud</th>
                <th class="center aligned">Latitud</th>
                <th class="center aligned">ver</th>
                <th class="center aligned">editar</th>
                <th class="center aligned">borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centros as $centro)
                <tr>
                    <td class="center aligned">{{ $centro->codigo }}</td>
                    <td class="center aligned">{{ $centro->denominacion }}</td>
                    <td class="center aligned">{{ $centro->ciudad }}</td>
                    <td class="center aligned">
                        <a href="{{ url('centro') . '?isla=' . $centro->isla }}">
                            {{ $centro->isla }}
                        </a>
                    </td>
                    <td class="center aligned">{{ $centro->latitud }}</td>
                    <td class="center aligned">{{ $centro->longitud }}</td>
                    <td class="center aligned">
                        <form action="{{ route('centro.show', $centro->id) }}" method='GET'>
                            @csrf
                            <i class="eye icon"></i>
                        </form>
                    </td>
                    <td class="center aligned">
                        <form action="{{ route('centro.edit', $centro->id) }}" method='GET'>
                            @csrf
                            <i class="edit icon"></i>
                        </form>
                    </td>
                    <td class="center aligned">
                        <form action="{{ route('centro.destroy', $centro->id) }}" method='POST'>
                            @method('DELETE')
                            @csrf
                            <i class="trash icon"></i>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $("i.icon").click(function() {
                $(this).closest("form").submit();
            });
            $(document).ready( function () {
                $('#centros').DataTable();
            } );
        });
    </script>
@endsection
