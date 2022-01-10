@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Listado de precios de {{ $client->name }}</h1>

    <div class="row">
        <div class="col">
            <div class="btn-group mt-1" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-primary" href="{{ route('price.create', ['client_id' => $client->id]) }}"
                    role="button">Asignar precio a un producto</a>
                <a type="button" href="{{ route('client.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
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
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col" style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client->products as $item)
                            @if ($item->deleted != '1')
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format((float) $item->pivot->price, 2, ',', '') }}€</td>
                                    <td style="text-align: center;">
                                        <form method="POST"
                                            action="{{ route('price.destroy', ['price' => $client->id, 'product_id' => $item->id]) }}"
                                            id="deleteForm">

                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('price.edit', ['price' => $client->id, 'product_id' => $item->id]) }}"
                                                role="button">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>
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
