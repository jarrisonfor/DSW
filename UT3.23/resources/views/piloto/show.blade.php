@extends('layouts.app1')

@section('contenido')
    <h2>Piloto</h2>

    <table class="table w-100">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>F.nac</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Dni</th>
                <th>Telefono</th>
                <th>Vuelos<th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $piloto->id }}</td>
                <td>{{ $piloto->nombre }}</td>
                <td>{{ $piloto->apellidos }}</td>
                <td>{{ $piloto->f_nacimiento->toDateString() }}</td>
                <td>{{ $piloto->edad }}</td>
                <td>{{ $piloto->email }}</td>
                <td>{{ $piloto->dni }}</td>
                <td>{{ $piloto->telefono }}</td>
                <td>{{ $piloto->vuelos->count() }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Vuelos del piloto</h2>
    <table class="table w-100 principal">
        <thead>
            <tr>
                <th data-orderable="false">Id</th>
                <th data-orderable="false">Codigo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th data-orderable="false">Fecha</th>
                <th data-orderable="false">Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($piloto->vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->id }}</td>
                <td>{{ $vuelo->codigo }}</td>
                <td>{{ $vuelo->origen }}</td>
                <td>{{ $vuelo->destino }}</td>
                <td>{{ $vuelo->fecha->toDateString() }}</td>
                <td>{{ $vuelo->hora }}</td>
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
