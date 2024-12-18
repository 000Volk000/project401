<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitudes Aprobadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
        <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- Mostrar el correo del usuario -->
                <td><?php echo e($solicitud->user->email); ?></td>

                <!-- Mostrar la ciudad y universidad del destino -->
                <td><?php echo e($solicitud->destino->nombreCiudad); ?></td>
                <td><?php echo e($solicitud->destino->nombreUniversidad); ?></td>

                <!-- Mostrar el orden de preferencia -->
                <td><?php echo e($solicitud->preference_order); ?></td>

                <!-- Mostrar el estado de la solicitud -->
                <td><?php echo e($solicitud->status); ?></td>

                <td><?php echo e($solicitud->user->rol); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\sprintcode\resources\views/aprobadas.blade.php ENDPATH**/ ?>