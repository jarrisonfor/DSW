@extends('layouts.general') @section('contenido')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
	nav {
		display: inline-block;
	}

	.cabecera {
		display: flex;
		justify-content: space-between;
	}
</style>
<div class='cabecera'>

	<a href="UT5_2/create">
		<button id="insertar" class="ui button primary green">
			<i class="icon add"></i>
			Insertar
		</button>
	</a>
	{{ $ut5_2->links() }}
</div>
<table class="ui celled table">
	<thead>
		<tr>
			<th class="center aligned">empresa</th>
			<th class="center aligned">Contacto</th>
			<th class="center aligned">direccion</th>
			<th class="center aligned">ciudad</th>
			<th class="center aligned">pais</th>
			<th class="center aligned">PDF</th>
			<th class="center aligned">ver</th>
			<th class="center aligned">editar</th>
			<th class="center aligned">borrar</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($ut5_2 as $i)
		<tr>
			<td class="center aligned">
				<a href="{{url('UT5_2')}}/{{$i->IdProveedor}}/productos">{{$i->NombreCompañía}}</a>
			</td>
			<td class="center aligned" data-id="{{$i->IdProveedor}}">
				<span class="contacto">{{$i->NombreContacto}}</span>
			</td>
			<td class="center aligned">{{$i->Dirección}}</td>
			<td class="center aligned">{{$i->Ciudad}}</td>
			<td class="center aligned">{{$i->País}}</td>
			<td class="center aligned">
				<form action="{{url('UT5_2')}}/{{$i->IdProveedor}}/pdf" method='GET'>
					@csrf
					<i class="file pdf outline icon"></i>
				</form>
			</td>
			<td class="center aligned">
				<form action="{{url('UT5_2')}}/{{$i->IdProveedor}}" method='GET'>
					@csrf
					<i class="eye icon"></i>
				</form>
			</td>
			<td class="center aligned">
				<form action="{{url('UT5_2')}}/{{$i->IdProveedor}}/edit" method='GET'>
					@csrf
					<i class="edit icon"></i>
				</form>
			</td>
			<td class="center aligned">
				<form action="{{url('UT5_2')}}/{{$i->IdProveedor}}" method='POST'>
					@method('DELETE') @csrf
					<i class="trash icon"></i>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="ui tiny modal">
	<div class="header">Header</div>
	<div class="content" id="contenidomodal">
	</div>

</div>
<script>
	$(document).ready(function() {
		$("i.icon").click(function() {
			$(this).closest("form").submit();
		});
		$('.contacto').click(function() {
			var id = $(this).closest("td").data();
			console.log(id.id);
			$('.tiny.modal')
				.modal('show');
			$.ajax({
				url: `{{url('api/UT5_2')}}/${id.id}/contacto`,
				method: 'GET',
				success: function(r) {
					var html = `
						<table class="ui celled table">
	
	<thead>
		<tr>
			<th class="center aligned">id</th>
			<th class="center aligned">nombre</th>
			<th class="center aligned">precio unidad</th>
		</tr>
	</thead>
	<tbody>

					`
					$.each(r, function(index, value) {
						html += `
		<tr>
			<td class="center aligned">${value.id}</td>
			<td class="center aligned">${value.producto}</td>
			<td class="center aligned">${value.precio_unidad}</td>
		</tr>
						`
					});
					html += `
						</tbody>
</table>

					`
					$('#contenidomodal').html(html)
				}
			});
		})
	});
</script>
@endsection