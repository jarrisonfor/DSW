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
                center: new Microsoft.Maps.Location("{{ $centro->latitud }}", "{{ $centro->longitud }}"),
                zoom: 11
            });
            var pushpin = new Microsoft.Maps.Pushpin({
                latitude: "{{ $centro->latitud }}",
                longitude: "{{ $centro->longitud }}"
            }, {
                title: "{{ $centro->Denominacion }}"
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
                <th class="center aligned">Codigo</th>
                <th class="center aligned">Denominacion</th>
                <th class="center aligned">Ciudad</th>
                <th class="center aligned">Isla</th>
                <th class="center aligned">Longitud</th>
                <th class="center aligned">Latitud</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center aligned">{{ $centro->codigo }}</td>
                <td class="center aligned">{{ $centro->denominacion }}</td>
                <td class="center aligned">{{ $centro->ciudad }}</td>
                <td class="center aligned">{{ $centro->isla }}</td>
                <td class="center aligned">{{ $centro->latitud }}</td>
                <td class="center aligned">{{ $centro->longitud }}</td>
            </tr>
        </tbody>
    </table>
    <div id="myMap"></div>

@endsection
