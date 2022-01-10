@extends('layouts.app')

@section('contenido')

    <h1 class="display-5">Editar cliente</h1>

    @if ($errors != '[]')
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('client.update', $client->id) }}" id="form">

        @csrf

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-4 mt-3 ">
            <label for="name" class="form-label">Establecimiento</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="companyName" class="form-label">Empresa</label>
            <input type="text" class="form-control" name="companyName" value="{{ $client->companyName }}"
                autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="identification" class="form-label">CIF</label>
            <input type="text" class="form-control" name="identification" value="{{ $client->identification }}">
        </div>

        <div class="col-md-2 mt-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $client->email }}" autocomplete="off">
        </div>

        <div class="col-md-4 mt-3">
            <label for="address" class="form-label">Calle</label>
            <input type="text" class="form-control" name="address" value="{{ $client->address }}" autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="municipality" class="form-label">Población</label>
            <input type="text" class="form-control" name="municipality" value="{{ $client->municipality }}"
                autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="postalCode" class="form-label">Código Postal</label>
            <input type="text" class="form-control" name="postalCode" value="{{ $client->postalCode }}"
                autocomplete="off">
        </div>

        <div class="col-md-2 mt-3">
            <label for="province" class="form-label">Provincia</label>
            <input type="text" class="form-control" name="province" value="{{ $client->province }}" autocomplete="off">
        </div>

        <div class="col-12 mt-3">
            <button id="submit-btn" class="btn btn-primary">Actualizar cliente</button>
            <a href="{{ route('client.show', $client->id) }}" class="btn btn-secondary">Volver</a>
        </div>

    </form>

    <script>
        $(document).ready(function() {

            var chk_name = $('#name').val();

            function checker() {
                if (chk_name == $('#name').val()) {
                    $("#name").prop("disabled", true);
                }

                $('#form').submit();
            }

            $("#submit-btn").click(function() {
                event.preventDefault();
                checker();
            });
        });
    </script>

@endsection
