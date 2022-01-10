@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Nuevo producto</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('product.store') }}">

        @csrf

        <div class="col-md-2 mt-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="name" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="tax" class="form-label">Impuesto del producto</label>
            <input type="text" class="form-control" name="tax" autocomplete="off">
        </div>

        <div class="col-md-6 mt-3">
            <label for="description" class="form-label">Descripción del producto</label>
            <input type="text" class="form-control" name="description" autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Crear producto</button>
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </form>

@endsection
