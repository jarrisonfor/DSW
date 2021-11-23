@extends('layouts.general')

@section('contenido')
    <script type='text/javascript'
        src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArEa1rgs3SfHTJuvTNbDDAYLVTlQfCHeTUu5bbRlwU6DuTR5YvBT3MkYqCkaPGYR'
        async defer>
    </script>
    <script>
        function GetMap() {
            var navigationBarMode = Microsoft.Maps.NavigationBarMode;
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                mapTypeId: Microsoft.Maps.MapTypeId.aerial,
                navigationBarMode: navigationBarMode.compact
            });
            map.setView({
                center: new Microsoft.Maps.Location("{{ $proveedor->latitud }}", "{{ $proveedor->longitud }}"),
                zoom: 11
            });
            var pushpin = new Microsoft.Maps.Pushpin({
                latitude: "{{ $proveedor->latitud }}",
                longitude: "{{ $proveedor->longitud }}"
            }, {
                title: "{{ $proveedor->nombreCompañía }}"
            });
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
                <td class="center aligned">{{ $proveedor->id }}</td>
                <td class="center aligned">{{ $proveedor->nombreCompañía }}</td>
                <td class="center aligned">{{ $proveedor->nombreContacto }}</td>
                <td class="center aligned">{{ $proveedor->dirección }}</td>
                <td class="center aligned">{{ $proveedor->ciudad }}</td>
                <td class="center aligned">{{ $proveedor->país }}</td>
                <td class="center aligned">{{ $proveedor->latitud }}</td>
                <td class="center aligned">{{ $proveedor->longitud }}</td>
            </tr>
        </tbody>
    </table>
    <div id="myMap"></div>

@endsection
