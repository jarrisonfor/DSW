@extends('layouts.general')

@section('contenido')

<h1>
	Mostrar
</h1>

<table class="ui celled table">
    <thead>
		<tr>
      <th class="center aligned">id</th>
      <th class="center aligned">empresa</th>
      <th class="center aligned">Contacto</th>
      <th class="center aligned">direccion</th>
      <th class="center aligned">ciudad</th>
      <th class="center aligned">pais</th>
      <th class="center aligned">lat</th>
      <th class="center aligned">lng</th>
    </tr>
		</thead>
		<tbody>
            <tr>
                <td class="center aligned">{{$IdProveedor}}</td>
                <td class="center aligned">{{$NombreCompañía}}</td>
				<td class="center aligned">{{$NombreContacto}}</td>
                <td class="center aligned">{{$Dirección}}</td>
                <td class="center aligned">{{$Ciudad}}</td>
                <td class="center aligned">{{$País}}</td>
                <td class="center aligned">{{$Latitud}}</td>
                <td class="center aligned">{{$Longitud}}</td>
            </tr>
		</tbody>
</table>
<h4>
	Si quieres ver el mapa, escanea el siguiente QR
</h4>
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->merge('https://i.imgur.com/hiuszoF.png', .2, true)->generate(url('UT5_2').'/'.$IdProveedor))!!} ">
@endsection