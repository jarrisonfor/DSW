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
    <h4>
        Si quieres ver el mapa, escanea el siguiente QR
    </h4>
    <img src="data:image/png;base64, {!!
        base64_encode(
            QrCode::format('png')->size(500)->errorCorrection('H')->merge('https://i.imgur.com/hiuszoF.png', 0.2, true)->generate(
                route('centro.show', $centro->id)
            )
        ) !!} ">
