@extends('layouts.app')

@section('contenido')

    <div class="card">
        <div class="card-header">
            Identificación del cliente
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $client->name ?? 'Vacío' }}</h5>
            <p class="card-text">
                Empresa: {{ $client->companyName ?? 'Vacío' }} <br>
                CIF: {{ $client->identification ?? 'Vacío' }} <br>
                Teléfono de contacto: {{ $client->phone ?? 'Sin teléfono' }} <br>
                Email: {{ $client->email ?? 'Sin email' }}
            </p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Dirección de facturación
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $client->address ?? 'Vacío' }}</h5>
            <p class="card-text">{{ $client->municipality ?? 'Vacío' }}, {{ $client->postalCode ?? 'Vacío' }},
                {{ $client->province ?? 'Vacío' }}</p>
        </div>
    </div>

    <div class="card mt-3 mb-3">
        <div class="card-header">
            Fechas
        </div>
        <div class="card-body">
            <h5 class="card-title">Cliente añadido a la base de datos:</h5>
            <p class="card-text">{{ $client->created_at ?? 'vacio' }}</p>
            <h5 class="card-title">Última edición:</h5>
            <p class="card-text">{{ $client->updated_at ?? 'vacio' }}</p>
        </div>
    </div>
    @if (@Auth::user()->hasRole('admin'))

        <form method="POST" action="{{ route('client.destroy', $client->id) }}" id="deleteForm">
            @method('DELETE')
            @csrf

            <div class="btn-group">
                <button type="submit" class="btn btn-danger" aria-expanded="false">
                    Eliminar
                </button>
            </div>

            <a class="btn btn-success" href="{{ route('client.edit', $client) }}" role="button">Editar</a>
    @endif
    <a class="btn btn-secondary" href="{{ route('client.index') }}" role="button">Volver</a>
    @if (@Auth::user()->hasRole('admin'))
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
    @endif


@endsection
