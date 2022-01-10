@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Clientes</h1>

    <div class="row g-3">
        <div class="col">
            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                @if (@Auth::user()->hasRole('admin'))
                    <a type="button" class="btn btn-primary" href="{{ route('client.create') }}" role="button">Añadir
                        cliente</a>
                @endif
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
                        <th scope="col">Establecimiento</th>
                        <th scope="col">Empresa</th>
                        <th scope="col" style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $item)
                        @if ($item->deleted != '1')
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->companyName }}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="{{ route('invoice.create', ['client_id' => $item->id]) }}"
                                            class="btn btn-primary"><i class="bi bi-receipt"></i></a>
                                        @if (@Auth::user()->hasRole('admin'))
                                            <a type="button" href="{{ route('price.index', ['client_id' => $item->id]) }}"
                                                class="btn btn-success"><i class="bi bi-tags"></i></a>
                                        @endif
                                        <a type="button" href="{{ route('client.show', $item->id) }}"
                                            class="btn btn-secondary"><i class="bi bi-eye"></i></a>
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
