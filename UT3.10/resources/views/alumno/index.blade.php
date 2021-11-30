@extends('layouts.general') @section('contenido')
    <style>
        nav {
            display: inline-block;
        }

        .cabecera {
            margin-bottom: 10px;
        }

    </style>
    <div class="cabecera">

        <a href="{{ route('alumno.create') }}">
            <button id="insertar" class="ui positive button">
                <i class="icon add"></i>
                Insertar
            </button>
        </a>
        <a href="{{ route('alumno.pdf') }}">
            <button id="pdf" class="ui button">
                <i class="file pdf icon"></i>
                PDF
            </button>
        </a>
    </div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th class="center aligned">id</th>
                <th class="center aligned">nombre</th>
                <th class="center aligned">apellidos</th>
                <th class="center aligned">email</th>
                <th class="center aligned">f_nacimiento</th>
                <th class="center aligned">mes</th>
                <th class="center aligned">c_postal</th>
                <th class="center aligned">codigo</th>
                <th class="center aligned">editar</th>
                <th class="center aligned">borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td class="center aligned">{{ $alumno->id }}</td>
                    <td class="center aligned">{{ $alumno->nombre }}</td>
                    <td class="center aligned">{{ $alumno->apellidos }}</td>
                    <td class="center aligned">{{ $alumno->email }}</td>
                    <td class="center aligned">{{ $alumno->f_nacimiento->format('d/m/Y') }}</td>
                    <td class="center aligned">{{ $alumno->mes }}</td>
                    <td class="center aligned">{{ $alumno->c_postal }}</td>
                    <td class="center aligned">{{ $alumno->codigo }}</td>
                    <td class="center aligned">
                        <form action="{{ route('alumno.edit', $alumno->id) }}" method='GET'>
                            @csrf
                            <i class="edit icon"></i>
                        </form>
                    </td>
                    <td class="center aligned" data-id="{{ $alumno->id }}">
                        <i class="trash icon borrar"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
            $("i.icon.edit").click(function() {
                $(this).closest("form").submit();
            });
            $('.borrar').click(function() {
                let $tr = $(this).closest("tr");
                let id = $(this).closest("td").data();
                $.ajax({
                    method: "POST",
                    url: `{{ url('alumno') }}/${id.id}`,
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}",
                    },
                    success: function() {
                        $tr.fadeOut()
                    }
                });
            })
        });
    </script>
@endsection
