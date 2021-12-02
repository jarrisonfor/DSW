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
        <a href="{{ route('usuario.delete') }}">
            <button class="ui red button">
                <i class="icon add"></i>
                Borrar todo
            </button>
        </a>
        <a href="{{ route('usuario.restore') }}">
            <button class="ui positive button">
                <i class="icon add"></i>
                Restaurar todo
            </button>
        </a>
    </div>
    <table class="ui celled table principal">
        <thead>
            <tr>
                <th class="center aligned" data-orderable="false">Id</th>
                <th class="center aligned">Nombre</th>
                <th class="center aligned" data-orderable="false">Apellidos</th>
                <th class="center aligned" data-orderable="false">F. Nacimiento</th>
                <th class="center aligned" data-orderable="false">Edad</th>
                <th class="center aligned" data-orderable="false">Nº publicaciones</th>
                <th class="center aligned" data-orderable="false">Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr data-id="{{ $usuario->id }}">
                    <td class="center aligned">{{ $usuario->id }}</td>
                    <td class="center aligned">{{ $usuario->nombre }}</td>
                    <td class="center aligned">{{ $usuario->apellidos }}</td>
                    <td class="center aligned">{{ $usuario->f_nacimiento }}</td>
                    <td class="center aligned">{{ $usuario->edad }}</td>
                    <td class="center aligned publicaciones">{{ $usuario->publicacion->count() }}</td>
                    <td class="center aligned"><i class="trash icon borrar"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ui fullscreen modal">
        <div class="header">Publicaciones</div>
        <div class="content">
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Publicacion</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody class="rows">
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.publicaciones').click(function() {
                let id = $(this).closest("tr").data();
                $('.fullscreen.modal')
                    .modal({
                        onShow: function() {
                            $.ajax({
                                method: "GET",
                                url: `{{ url('usuario') }}/${id.id}/publicaciones`,
                                success: function(data) {
                                    $('.rows').html('');
                                    data.forEach(function(value, index) {
                                        $('.rows').append(`
                                            <tr>
                                                <td>${value.id}</td>
                                                <td>${value.titulo}</td>
                                                <td>${value.publicacion}</td>
                                                <td>${value.fecha}</td>
                                            </tr>
                                        `);
                                    });
                                }
                            });
                        },
                    })
                    .modal('show');
            });
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
            $("i.icon.edit").click(function() {
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
                            url: `{{ url('usuario') }}/${tr.data().id}`,
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
