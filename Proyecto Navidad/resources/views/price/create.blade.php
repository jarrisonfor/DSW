@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Nuevo precio para {{ $client->name }}</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('price.store') }}">

        @csrf

        <div class="col-md-3 mt-3">
            <label for="product_id" class="form-label">Listado de productos</label>
            <select class="custom-select" id="product_id" name="product_id">
                <option value="" selected>Elige un producto</option>
                @forelse($products as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="">No existe ningún producto</option>
                @endforelse
            </select>
        </div>

        <div class="col-md-2 mt-3">
            <label for="price" class="form-label">Precio designado</label>
            <input type="text" class="form-control" name="price" autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Asignar precio</button>
            <a href="{{ route('price.index', ['client_id' => $client->id]) }}" class="btn btn-secondary">Volver</a>
        </div>

        <input type="hidden" class="form-control" name="client_id" autocomplete="off" value="{{ $client->id }}">

    </form>

@endsection
