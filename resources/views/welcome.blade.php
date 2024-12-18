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

</head>
<body>
<x-navbar>

</x-navbar>
@if ($message = Session::get('success'))
    <div class="alert alert-success m-4">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container-fluid mt-5">
    <h1>Destinos Universidades</h1>
    <button class="btn btn-primary">
        <a href="/createDest" style="text-decoration: none; color: white;">Crear Destino</a>
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ciudad</th>
            <th scope="col">Universidad</th>
            <th scope="col">Especialidad</th>
            <th scope="col">
                <button class="btn btn-primary">
                    <a href="/asignaturas/" style="text-decoration: none; color: white;">Gestionar Asignaturas</a>
                </button>
            </th>
            <th scope="col">
                <button class="btn btn-warning">
                    <a href="/solicitudes/" style="text-decoration: none; color: white;">Gestionar Solicitudes</a>
                </button>
            </th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($destinos as $destino)
            <tr>
                <td>{{$destino->nombreCiudad}}</td>
                <td>{{$destino->nombreUniversidad}}</td>
                <td>{{$destino->especialidad}}</td>
                <td><button class="btn btn-info">
                        <a href="/asignaturas/{{$destino->id}}" style="text-decoration: none; color: white;">Ver asignaturas</a>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger">
                        <a href="/delete/{{$destino->id}}" style="text-decoration: none; color: white;">Eliminar</a>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

