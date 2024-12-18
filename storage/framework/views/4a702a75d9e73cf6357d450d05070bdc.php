<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
<?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<div class="container-fluid mt-5">
    <h1>Destinos Universidades</h1>
    <?php if(!$solicitudesAprobadas): ?>
        <?php if (isset($component)) { $__componentOriginal49e789a71b14f452b84038b0808c5260 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49e789a71b14f452b84038b0808c5260 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.newapplication','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('newapplication'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49e789a71b14f452b84038b0808c5260)): ?>
<?php $attributes = $__attributesOriginal49e789a71b14f452b84038b0808c5260; ?>
<?php unset($__attributesOriginal49e789a71b14f452b84038b0808c5260); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49e789a71b14f452b84038b0808c5260)): ?>
<?php $component = $__componentOriginal49e789a71b14f452b84038b0808c5260; ?>
<?php unset($__componentOriginal49e789a71b14f452b84038b0808c5260); ?>
<?php endif; ?>
    <?php endif; ?>
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
        </th>
        <tbody>
        <?php $__currentLoopData = $destinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($destino->nombreCiudad); ?></td>
                <td><?php echo e($destino->nombreUniversidad); ?></td>
                <td><?php echo e($destino->especialidad); ?></td>
                <td>
                    <button class="btn btn-primary">
                        <a href="/asignaturas/<?php echo e($destino->id); ?>" style="text-decoration: none; color: white;">
                            Ver asignaturas
                        </a>
                    </button>
                </td>
                <td>
                    <!-- Check if the destination has been requested -->
                    <?php if(isset($destino->solicitud_status)): ?> <!-- If the user has requested this destination -->
                    <button class="btn btn-success" disabled>
                        Destino seleccionado (Status: <?php echo e($destino->solicitud_status); ?>)
                    </button>
                    <!-- Show cancel button if the destination has been selected -->
                    <?php if($destino->solicitud_status == 'pendiente'): ?>
                        <form action="<?php echo e(route('solicitudes.cancelar', $destino->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger">
                                Cancelar destino
                            </button>
                        </form>
                    <?php endif; ?>

                    <!-- Show renovar button if the status is canceled -->
                    <?php if($destino->solicitud_status == 'cancelado'): ?>
                        <form action="<?php echo e(route('solicitudes.renovar', $destino->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-info">
                                Renovar destino
                            </button>
                        </form>
                    <?php endif; ?>
                    <?php else: ?> <!-- If the destination has not been requested yet -->
                    <button class="btn btn-warning solicitar-btn" data-id="<?php echo e($destino->id); ?>">
                        Solicitar destino
                    </button>
                    <?php endif; ?>
                    <?php if($destino->solicitud_status == "pendiente"): ?>
                        Orden: <?php echo e($destino->preference_order); ?>

                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /opt/lampp/htdocs/sprintcode/resources/views/estudiante.blade.php ENDPATH**/ ?>