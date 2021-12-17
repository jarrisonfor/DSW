@extends('layouts.app1') @section('contenido')
    <div>
        <a href="{{ route('vuelo.create') }}">
            <button class="btn btn-success">
                Insertar
            </button>
        </a>
    </div>
    <br>
    <table class="principal w-100">
        <thead>
            <tr>
                <th>Id</th>
                <th>Codigo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo)
                <tr data-id="{{ $vuelo->id }}">
                    <td>{{ $vuelo->id }}</td>
                    <td>{{ $vuelo->codigo }}</td>
                    <td>{{ $vuelo->origen }}</td>
                    <td>{{ $vuelo->destino }}</td>
                    <td>{{ $vuelo->fecha->toDateString() }}</td>
                    <td>{{ $vuelo->hora }}</td>
                    <td>
                        <form action="{{ route('vuelo.show', $vuelo->id) }}" method='GET'>
                            @csrf
                            <button class="btn btn-primary">Ver</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('vuelo.edit', $vuelo->id) }}" method='GET'>
                            @csrf
                            <button class="btn btn-warning editar">Editar</button>
                        </form>
                    </td>
                    <td data-id="{{ $vuelo->id }}">
                        <button class="btn btn-danger borrar">Borrar</button>
                    </td>
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
            $(".editar").click(function() {
                $(this).closest("form").submit();
            });
            $('.borrar').click(function() {
                Swal.fire({
                    title: 'Estas seguro que quieres borrarlo?',
                    showCancelButton: true,
                    confirmButtonText: 'Borrar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let tr = $(this).closest("tr");
                        $.ajax({
                            method: "POST",
                            url: `vuelo/${tr.data().id}`,
                            data: {
                                _method: 'DELETE',
                                _token: "{{ csrf_token() }}",
                            },
                            success: function() {
                                tr.fadeOut()
                            }
                        });
                        Swal.fire('Borrado!', '', 'success')
                    }
                })
            })
        });
    </script>
@endsection
