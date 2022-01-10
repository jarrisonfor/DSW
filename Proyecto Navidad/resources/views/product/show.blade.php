@extends('layouts.app')

@section('contenido')

    <div class="card">
        <div class="card-header">
            Producto
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name ?? 'vacio' }}</h5>
            <p class="card-text">{{ $product->description ?? 'vacio' }}</p>
        </div>
    </div>

    <div class="card mt-3 mb-3">
        <div class="card-header">
            Fechas
        </div>
        <div class="card-body">
            <h5 class="card-title">Producto añadido a la base de datos el:</h5>
            <p class="card-text">{{ $product->created_at ?? 'vacio' }}</p>
            <h5 class="card-title">Última edición:</h5>
            <p class="card-text">{{ $product->updated_at ?? 'vacio' }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('product.destroy', $product->id) }}" id="deleteForm">
        @method('DELETE')
        @csrf

        <div class="btn-group">
            <button type="submit" class="btn btn-danger" aria-expanded="false">
                Eliminar
            </button>
        </div>

        <a class="btn btn-success" href="{{ route('product.edit', $product) }}" role="button">Editar</a>
        <a class="btn btn-secondary" href="{{ route('product.index') }}" role="button">Volver</a>

    </form>

    <script>
        $('#deleteForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Es revertible, pero tendras que llamar a un administrador!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!'
            }).then((result) => {
                if (result.value) {
                    $('#deleteForm').submit();
                }
            })
        });
    </script>

@endsection
