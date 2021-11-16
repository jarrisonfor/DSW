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
    <h4>
        Si quieres ver el mapa, escanea el siguiente QR
    </h4>
    <img src="data:image/png;base64, {!!
        base64_encode(
            QrCode::format('png')->size(500)->errorCorrection('H')->merge('https://i.imgur.com/hiuszoF.png', 0.2, true)->generate(
                route('proveedor.show', $proveedor->id)
            )
        ) !!} ">
