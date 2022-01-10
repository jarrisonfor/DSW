@extends('layouts.app')

@section('contenido')

    <h1 class="h2">Listado de usuarios</h1>

    <div class="row g-3">
        <div class="col">
            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-primary" href="{{ route('user.create') }}" role="button">Añadir
                    usuario</a>
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
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alias</th>
                        <th scope="col">F. Alta</th>
                        <th scope="col" style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        @if ($item->deleted != '1' && $item->alias != 'AA')
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->alias }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-success"><i class="bi bi-pencil"></i></a>
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
