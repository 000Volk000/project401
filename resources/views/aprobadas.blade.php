<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitudes Aprobadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<x-navbar></x-navbar>
<div class="container mt-5">
    <h1>Listado de Solicitudes Aprobadas</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Usuario (Correo)</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Universidad</th>
            <th scope="col">Orden de Preferencia</th>
            <th scope="col">Estado de Solicitud</th>
            <th scope="col">Rol</th>
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

                <!-- Mostrar el estado de la solicitud -->
                <td>{{ $solicitud->status }}</td>

                <td>{{ $solicitud->user->rol }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
