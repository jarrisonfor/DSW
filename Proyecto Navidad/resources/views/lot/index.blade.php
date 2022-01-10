@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Gestión de lotes de {{ $product->name }}</h1>

    <div class="row">
        <div class="col">
            <div class="btn-group mt-1" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-primary" href="{{ route('lot.create', ['product_id' => $product->id]) }}"
                    role="button">Añadir lote</a>
                <a type="button" href="{{ route('product.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        ¡Recuerda que para añadir un lote <strong><u>nuevo</u></strong> tienes que usar el botón de crear. NO uses un lote
        antiguo (no lo sobreescribas)!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mt-3">
        <div class="col">
            <div class="table-responsive table-hover">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha de entrada</th>
                            <th scope="col">Fecha de caducidad</th>
                            <th scope="col" style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lots as $item)
                            @if ($item->deleted != '1')
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->deliveryDate }}</td>
                                    <td>{{ $item->expirationDate }}</td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form method="POST"
                                                action="{{ route('lot.destroy', [$item->id, 'product_id' => $product->id]) }}"
                                                id="deleteForm">
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('lot.edit', [$item->id, 'product_id' => $product->id]) }}"
                                                    role="button">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
