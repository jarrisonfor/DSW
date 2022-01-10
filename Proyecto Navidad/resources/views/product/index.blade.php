@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Inventario</h1>

    <div class="row g-3">
        <div class="col">
            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-primary" href="{{ route('product.create') }}" role="button">Añadir
                    producto</a>
                <a type="button" href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Impuestos</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        @if ($item->deleted != '1')
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->tax }}%</td>
                                <td>{{ $item->description }}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-success"
                                            href="{{ route('lot.index', ['product_id' => $item->id]) }}">
                                            <i class="bi bi-box"></i>
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('product.show', $item->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
