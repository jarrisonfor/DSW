@extends('layouts.app')

@section('contenido')

    <div class="card">
        <div class="card-header">
            Información
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $invoice->invoiceNumber }}
            </h3>
            <p class="card-text">Emisión de
                factura:<br>{{ $invoice->created_at ?? 'vacio' }}</p>
            <div class="alert alert-success" role="alert">
                @if ($invoice->client->discount != null)
                    <?php $totalReal = ($invoice->total - $invoice->total * ($invoice->client->discount / 100)) * 1.07; ?>
                    <b>Total: {{ number_format(round($totalReal, 2), 2, ',', ' ') }}€</b>
                @else
                    <b>Total: {{ number_format(round($invoice->total * 1.07, 2), 2, ',', '.') }}€</b>
                @endif
            </div>
            <a href="{{ route('invoice.pdf', $invoice->id) }}" type="button" class="btn btn-success">Descargar en PDF</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Productos
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->products as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->pivot->invoiceQuantity }}</td>
                            <td>{{ $item->pivot->invoiceQuantity * $item->price }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3 mb-3">
        <div class="card-header">
            Cliente
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $invoice->client->name ?? 'Vacío' }}</h3>
            <p class="card-text">Nombre del cliente: {{ $invoice->client->name ?? 'Vacío' }}
                {{ $invoice->client->lastName ?? 'Vacío' }}</p>
            <p class="card-text">Teléfono de contacto: {{ $invoice->client->phone ?? 'Vacío' }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('invoice.destroy', $invoice->id) }}" id="deleteForm">
        @method('DELETE')
        @csrf

        <div class="btn-group">
            <button type="submit" class="btn btn-danger" aria-expanded="false">
                Eliminar
            </button>
        </div>
        <a class="btn btn-secondary" href="{{ route('invoice.index') }}" role="button" id="in-delete-btn">Volver</a>

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
