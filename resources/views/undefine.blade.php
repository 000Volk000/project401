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
<x-navbar></x-navbar>

<section class="content container-fluid ">
    <div class="row justify-content-center align-items-center d-flex vh-50">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title row justify-content-center align-items-center d-flex vh-50">Página no definida. Por favor pulse el botón Home en la barra de navegación, o el botón de volver</span>
                </div>
                <div class="card-body bg-white d-flex justify-content-center">
                    <button class="btn btn-info" style="background: blue; border: 0px;">
                        <a href="/" style="text-decoration: none; color: white;">Volver al menu principal</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
