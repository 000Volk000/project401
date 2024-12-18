<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitudes Pendientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Listado de Solicitudes Pendientes</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Usuario (Correo)</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Universidad</th>
            <th scope="col">Orden de Preferencia</th>
            <th scope="col">Estado de Solicitud</th>
            <th scope="col">Rol</th>
            <th scope="col">
                <button type="submit" class="btn btn-primary">
                    <a href="{{ route('solicitudAprobadas') }}" style="text-decoration: none; color: white;">
                        Mostrar Solicitudes Aprobadas
                    </a>
                </button>
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <!-- Mostrar el correo del usuario -->
                <td>{{ $solicitud->user->email }}</td>

                <!-- Mostrar la ciudad y universidad del destino -->
                <td>{{ $solicitud->destino->nombreCiudad }}</td>
                <td>{{ $solicitud->destino->nombreUniversidad }}</td>

                <!-- Mostrar el orden de preferencia -->
                <td>{{ $solicitud->preference_order }}</td>

                <td>{{ $solicitud->status }}</td>
                <td>{{ $solicitud->user->rol }}</td>
                <td>
                    <!-- Acción para aprobar la solicitud -->
                    <form action="{{ route('solicitudes.aprobar', $solicitud->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Aprobar Solicitud</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
