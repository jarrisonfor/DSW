@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Nuevo lote para {{ $product->name }}</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('lot.store') }}">

        @csrf

        <div class="col-md-2 mt-3">
            <label for="name" class="form-label">Identificador del lote</label>
            <input type="text" class="form-control" name="name" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="text" class="form-control" name="quantity" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="deliveryDate" class="form-label">Fecha de entrada</label>
            <input type="date" class="form-control" name="deliveryDate" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="expirationDate" class="form-label">Fecha de caducidad</label>
            <input type="date" class="form-control" name="expirationDate" autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Crear lote</button>
            <a href="{{ route('lot.index', ['product_id' => $product->id]) }}" class="btn btn-secondary">Volver</a>
        </div>

        <input type="hidden" class="form-control" name="product_id" autocomplete="off" value="{{ $product->id }}">

    </form>

@endsection
