<h1>
    Pdf
</h1>

<table class="ui celled table">
    <thead>
        <tr>
            <th class="center aligned">Id</th>
            <th class="center aligned">Nombre</th>
            <th class="center aligned">Apellidos</th>
            <th class="center aligned">Email</th>
            <th class="center aligned">F. Nacimiento</th>
            <th class="center aligned">Mes</th>
            <th class="center aligned">C. Postal</th>
            <th class="center aligned">Codigo</th>
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
