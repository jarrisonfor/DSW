@extends('layouts.general') @section('contenido')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<table class="ui celled table">
	
	<thead>
		<tr>
			<th class="center aligned">id</th>
			<th class="center aligned">nombre</th>
			<th class="center aligned">precio unidad</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($ut5_7 as $i)
		<tr>
			<td class="center aligned">{{$i->id}}</td>
			<td class="center aligned">{{$i->producto}}</td>
			<td class="center aligned">{{$i->precio_unidad}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection