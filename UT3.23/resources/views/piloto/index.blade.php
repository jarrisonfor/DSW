@extends('layouts.app1') @section('contenido')
    <table class="principal w-100">
        <thead>
            <tr>
                <th data-orderable="false">Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th data-orderable="false">F.nac</th>
                <th data-orderable="false">Edad</th>
                <th data-orderable="false">Email</th>
                <th data-orderable="false">Dni</th>
                <th data-orderable="false">Telefono</th>
                <th data-orderable="false">Vuelos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilotos as $piloto)
                <tr data-id="{{ $piloto->id }}">
                    <td>{{ $piloto->id }}</td>
                    <td>{{ $piloto->nombre }}</td>
                    <td>{{ $piloto->apellidos }}</td>
                    <td>{{ $piloto->f_nacimiento->toDateString() }}</td>
                    <td>{{ $piloto->edad }}</td>
                    <td>{{ $piloto->email }}</td>
                    <td>{{ $piloto->dni }}</td>
                    <td>{{ $piloto->telefono }}</td>
                    <td><a href="{{ route('piloto.show', $piloto->id) }}"> {{ $piloto->vuelos->count() }} </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.principal').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

        });
    </script>
@endsection
