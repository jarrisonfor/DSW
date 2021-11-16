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
    <div class='cabecera'>

        <a href="{{ route('proveedor.create') }}">
            <button id="insertar" class="ui button primary green">
                <i class="icon add"></i>
                Insertar
            </button>
        </a>
        {{ $proveedores->links('vendor.pagination.bootstrap-4') }}
    </div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th class="center aligned">empresa</th>
                <th class="center aligned">Contacto</th>
                <th class="center aligned">direccion</th>
                <th class="center aligned">ciudad</th>
                <th class="center aligned">pais</th>
                <th class="center aligned">PDF</th>
                <th class="center aligned">ver</th>
                <th class="center aligned">editar</th>
                <th class="center aligned">borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td class="center aligned">
                        <a
                            href="{{ route('proveedor.productos', $proveedor->id) }}">{{ $proveedor->nombreCompañía }}</a>
                    </td>
                    <td class="center aligned" data-id="{{ $proveedor->id }}">
                        <span class="contacto">{{ $proveedor->nombreContacto }}</span>
                    </td>
                    <td class="center aligned">{{ $proveedor->dirección }}</td>
                    <td class="center aligned">{{ $proveedor->ciudad }}</td>
                    <td class="center aligned">{{ $proveedor->país }}</td>
                    <td class="center aligned">
                        <form action="{{ route('proveedor.pdf', $proveedor->id) }}" method='GET'>
                            @csrf
                            <i class="file pdf outline icon"></i>
                        </form>
                    </td>
                    <td class="center aligned">
                        <form action="{{ route('proveedor.show', $proveedor->id) }}" method='GET'>
                            @csrf
                            <i class="eye icon"></i>
                        </form>
                    </td>
                    <td class="center aligned">
                        <form action="{{ route('proveedor.edit', $proveedor->id) }}" method='GET'>
                            @csrf
                            <i class="edit icon"></i>
                        </form>
                    </td>
                    <td class="center aligned">
                        <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method='POST'>
                            @method('DELETE')
                            @csrf
                            <i class="trash icon"></i>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ui tiny modal">
        <div class="header">Header</div>
        <div class="content" id="contenidomodal">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("i.icon").click(function() {
                $(this).closest("form").submit();
            });
            $('.contacto').click(function() {
                var id = $(this).closest("td").data();
                $('.tiny.modal')
                    .modal('show');
                $.ajax({
                    url: `{{ url('api/proveedor') }}/${id.id}/contacto`,
                    method: 'GET',
                    success: function(r) {
                        var html = `
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th class="center aligned">id</th>
                                    <th class="center aligned">nombre</th>
                                    <th class="center aligned">precio unidad</th>
                                </tr>
                            </thead>
                            <tbody>`
                        $.each(r, function(index, value) {
                            html += `
                                <tr>
                                    <td class="center aligned">${value.id}</td>
                                    <td class="center aligned">${value.producto}</td>
                                    <td class="center aligned">${value.precio_unidad}</td>
                                </tr>`
                        });
                        html += `
                            </tbody>
                        </table>
                        `
                        $('#contenidomodal').html(html)
                    }
                });
            })
        });
    </script>
@endsection
