<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body>
      <h1>Destinos Universidades</h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Ciudad</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Universidad</th>
        <th scope="col">Especialidad</th>

    </tr>
  </thead>
  <tbody>
  @foreach($destinos as $destino)
      <tr>
          <td>{{$destino->nombreCiudad}}</td>
          <td>{{$destino->nombreAsignatura}}</td>
          <td>{{$destino->nombreUniversidad}}</td>
          <td>{{$destino->especialidad}}</td>
      </tr>
  @endforeach
  </tbody>
</table>
    </body>
</html>
