@extends('layouts.general')

@section('contenido')
<h1>
	Editar
</h1>
<form class="ui form" action="{{url('UT5_2')}}/{{$ut5_2->IdProveedor}}" method="POST">
    @method('PUT')
    @csrf
    <div class="field">
        <label>empresa</label>
        <input type="text" name="NombreCompañía" placeholder="empresa" value="{{$ut5_2->NombreCompañía}}">
    </div>
	    <div class="field">
        <label>Contacto</label>
        <input type="text" name="NombreContacto" placeholder="NombreContacto" value="{{$ut5_2->NombreContacto}}">
    </div>
    <div class="field">
        <label>direccion</label>
        <input type="text" name="Dirección" placeholder="direccion" value="{{$ut5_2->Dirección}}">
    </div>
    <div class="field">
        <label>ciudad</label>
        <input type="text" name="Ciudad" placeholder="ciudad" value="{{$ut5_2->Ciudad}}">
    </div>
    <div class="field">
        <label>pais</label>
        <input type="text" name="País" placeholder="pais" value="{{$ut5_2->País}}">
    </div>
    <div class="field">
        <label>lat</label>
        <input type="text" name="Latitud" placeholder="lat" value="{{$ut5_2->Latitud}}">
    </div>
    <div class="field">
        <label>lng</label>
        <input type="text" name="Longitud" placeholder="lng" value="{{$ut5_2->Longitud}}">
    </div>
    <button type="submit" id="insertar" class="ui button primary green">
        <i class="icon save"></i>
        Guardar
    </button>
</form>
@endsection