@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Editar precio de {{ $product->name }} para {{ $client->name }}</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST"
        action="{{ route('price.update', ['price' => $client->id, 'product_id' => $product->id]) }}">

        @csrf

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-2 mt-3">
            <label for="price" class="form-label">Precio designado</label>
            <input type="text" class="form-control" name="price" autocomplete="off" value="{{ $product->pivot->price }}">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Editar lote</button>
            <a href="{{ route('price.index', ['client_id' => $client->id]) }}" class="btn btn-secondary">Volver</a>
        </div>

        <input type="hidden" class="form-control" name="product_id" autocomplete="off" value="{{ $product->id }}">
        <input type="hidden" class="form-control" name="client_id" autocomplete="off" value="{{ $client->id }}">

    </form>

@endsection
