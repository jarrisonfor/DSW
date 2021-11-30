<h1>
    Pdf
</h1>

<table class="ui celled table">
    <thead>
        <tr>
            <th class="center aligned">id</th>
            <th class="center aligned">nombre</th>
            <th class="center aligned">apellidos</th>
            <th class="center aligned">email</th>
            <th class="center aligned">f_nacimiento</th>
            <th class="center aligned">mes</th>
            <th class="center aligned">c_postal</th>
            <th class="center aligned">codigo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td class="center aligned">{{ $alumno->id }}</td>
                <td class="center aligned">{{ $alumno->nombre }}</td>
                <td class="center aligned" data-id="{{ $alumno->id }}">{{ $alumno->apellidos }}</td>
                <td class="center aligned">{{ $alumno->email }}</td>
                <td class="center aligned">{{ $alumno->f_nacimiento->format('d/m/Y') }}</td>
                <td class="center aligned">{{ $alumno->mes }}</td>
                <td class="center aligned">{{ $alumno->c_postal }}</td>
                <td class="center aligned">{{ $alumno->codigo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
