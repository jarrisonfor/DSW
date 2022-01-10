@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Editar producto</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('product.update', $product->id) }}">

        @csrf

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-2 mt-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="tax" class="form-label">Impuesto</label>
            <input type="text" class="form-control" name="tax" value="{{ $product->tax }}" autocomplete="off">
        </div>

        <div class="col-md-6 mt-3">
            <label for="description" class="form-label">Descripción del producto</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}"
                autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Actualizar producto</button>
            <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Volver</a>
        </div>

    </form>

@endsection
