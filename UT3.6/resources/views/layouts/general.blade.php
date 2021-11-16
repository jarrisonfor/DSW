<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<title>Laravel</title>
	<style>
		.container {
			width: 90%;
			margin: 20px auto;
		}

		#myMap {
			width: 100%;
			height: 75vh;
		}
		img {
			width: 100%;
		}
	</style>
</head>

<body>
	<div class="container">
		@if ($errors->any())

		<div class="ui error message">
			<i class="close icon"></i>
			<div class="header">
				Han ocurrido los siguientes errores
			</div>
			<ul class="list">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif @yield('contenido')
	</div>
</body>

</html>