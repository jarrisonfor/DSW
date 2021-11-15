@extends('layouts.general')

@section('contenido')
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArEa1rgs3SfHTJuvTNbDDAYLVTlQfCHeTUu5bbRlwU6DuTR5YvBT3MkYqCkaPGYR' async defer></script>
<script>
function GetMap() {
	var navigationBarMode = Microsoft.Maps.NavigationBarMode;
	var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
		mapTypeId: Microsoft.Maps.MapTypeId.aerial,
		navigationBarMode: navigationBarMode.compact
	});
	map.setView({
		center: new Microsoft.Maps.Location("{{$ut5_2->Latitud}}", "{{$ut5_2->Longitud}}"),
		zoom: 11
  });
  var pushpin = new Microsoft.Maps.Pushpin(
				{
					latitude: "{{$ut5_2->Latitud}}",
					longitude: "{{$ut5_2->Longitud}}"
				},
				{
					title: "{{$ut5_2->NombreCompañía}}"
				}
			);
	map.entities.push(pushpin);
}
</script>
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
                <td class="center aligned">{{$ut5_2->IdProveedor}}</td>
                <td class="center aligned">{{$ut5_2->NombreCompañía}}</td>
				<td class="center aligned">{{$ut5_2->NombreContacto}}</td>
                <td class="center aligned">{{$ut5_2->Dirección}}</td>
                <td class="center aligned">{{$ut5_2->Ciudad}}</td>
                <td class="center aligned">{{$ut5_2->País}}</td>
                <td class="center aligned">{{$ut5_2->Latitud}}</td>
                <td class="center aligned">{{$ut5_2->Longitud}}</td>
            </tr>
		</tbody>
</table>
<div id="myMap"></div>

@endsection