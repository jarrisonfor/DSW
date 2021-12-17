@extends('layouts.app1') @section('contenido')
    <table class="principal w-100">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Precio</th>
                <th>Sumar</th>
                <th>Restar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasajes as $pasaje)
                <tr data-id="{{ $pasaje->id }}">
                    <td>{{ $pasaje->id }}</td>
                    <td>{{ $pasaje->nombre }}</td>
                    <td>{{ $pasaje->apellidos }}</td>
                    <td>{{ $pasaje->precio }}</td>
                    <td><a href="{{route('sumar', $pasaje->id)}}"><button class="btn btn-primary">Mas</button></a></td>
                    <td><a href="{{route('restar', $pasaje->id)}}"><button class="btn btn-danger">Menos</button></a></td>
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
