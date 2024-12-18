<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SprintCode</title>
    <link rel="icon" href="https://i.ibb.co/gWWr6tN/image-removebg-preview.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="../css/app.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .solicitar-btn{
            display: none;
        }
        .cerrar-btn{
            display: none;
        }
        .renovar-btn{
            display: none;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="https://i.ibb.co/gWWr6tN/image-removebg-preview.png" width="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                    @if (!$solicitudesAprobadas)
                        <li class="nav-item">
                            <button class="btn btn-success" id="nuevaSolicitudBtn">
                                Nueva solicitud
                            </button>
                        </li>
                    @endif
                    <button class="btn btn-danger cerrar-btn" id="cerrarSolicitudBtn">
                        Cerrar solicitud
                    </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bienvenido, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-5">
    <h1>Destinos Universidades</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ciudad</th>
            <th scope="col">Universidad</th>
            <th scope="col">Especialidad</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($destinos as $destino)
            <tr>
                <td>{{ $destino->nombreCiudad }}</td>
                <td>{{ $destino->nombreUniversidad }}</td>
                <td>{{ $destino->especialidad }}</td>
                <td>
                    <button class="btn btn-primary">
                        <a href="/asignaturas/{{ $destino->id }}" style="text-decoration: none; color: white;">
                            Ver asignaturas
                        </a>
                    </button>
                </td>
                <td>
                    <!-- Check if the destination has been requested -->
                    @if(isset($destino->solicitud_status)) <!-- If the user has requested this destination -->
                    <button class="btn btn-success" disabled>
                        Destino seleccionado (Status: {{ $destino->solicitud_status }})
                    </button>
                    <!-- Show cancel button if the destination has been selected -->
                    @if($destino->solicitud_status == 'pendiente')
                        <form action="{{ route('solicitudes.cancelar', $destino->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Cancelar destino
                            </button>
                        </form>
                    @endif

                    <!-- Show renovar button if the status is canceled -->
                    @if($destino->solicitud_status == 'cancelado')
                        <form action="{{ route('solicitudes.renovar', $destino->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info">
                                Renovar destino
                            </button>
                        </form>
                    @endif
                    @else <!-- If the destination has not been requested yet -->
                    <button class="btn btn-warning solicitar-btn" data-id="{{ $destino->id }}">
                        Solicitar destino
                    </button>
                    @endif
                    @if($destino->solicitud_status == "pendiente")
                        Orden: {{$destino->preference_order}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('nuevaSolicitudBtn').addEventListener('click', function() {
        // Mostrar todos los botones "Solicitar destino"
        document.querySelectorAll('.solicitar-btn').forEach(function(button) {
            button.style.display = 'inline-block';
        });
        document.getElementById('cerrarSolicitudBtn').style.display = 'inline-block';
        document.getElementById('nuevaSolicitudBtn').style.display = 'none';
    });

    document.getElementById('cerrarSolicitudBtn').addEventListener('click', function() {
        // Ocultar todos los botones "Solicitar destino"
        document.querySelectorAll('.solicitar-btn').forEach(function(button) {
            button.style.display = 'none';
        });
        document.getElementById('cerrarSolicitudBtn').style.display = 'none';
        document.getElementById('nuevaSolicitudBtn').style.display = 'block';
    });

    // Adjuntar eventos a todos los botones "Solicitar destino"
    document.querySelectorAll('.solicitar-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const destinoId = button.getAttribute('data-id'); // Obtener el ID del destino
            window.location.href="/solicitud/" + destinoId;

            // Ocultar el botón "Solicitar destino" que fue presionado
            button.style.display = 'none';

            // Implementar lógica adicional aquí (e.g., enviar una solicitud AJAX)
        });
    });
</script>

</body>
</html>