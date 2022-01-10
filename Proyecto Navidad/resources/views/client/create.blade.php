@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Nuevo cliente</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('client.store') }}">

        @csrf
        <div class="col-md-4 mt-3 ">
            <label for="name" class="form-label">Establecimiento</label>
            <input type="text" class="form-control" name="name" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="companyName" class="form-label">Empresa</label>
            <input type="text" class="form-control" name="companyName" autocomplete="off">
        </div>


        <div class="col-md-4 mt-3">
            <label for="identification" class="form-label">CIF</label>
            <input type="text" class="form-control" name="identification" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="phone" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="address" class="form-label">Calle</label>
            <input type="text" class="form-control" name="address" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="municipality" class="form-label">Población</label>
            <input type="text" class="form-control" name="municipality" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="postalCode" class="form-label">Código Postal</label>
            <input type="text" class="form-control" name="postalCode" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="province" class="form-label">Provincia</label>
            <input type="text" class="form-control" name="province" autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Crear cliente</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </form>

@endsection
