<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label"><?php echo e(__('Nombre')); ?></label>
            <input type="text" name="nombre" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombre', $asignatura?->nombre)); ?>" id="nombre" placeholder="Nombre">
            <?php echo $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_ciudad" class="form-label"><?php echo e(__('Ciudad')); ?></label>
            <select name="idCiudad" class="form-control <?php $__errorArgs = ['idCiudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_ciudad">
                <option value="" disabled selected>Selecciona una ciudad</option>
                <?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ciudad->id); ?>" <?php echo e(old('idCiudad', $asignatura?->idCiudad) == $ciudad->id ? 'selected' : ''); ?>>
                        <?php echo e($ciudad->nombreCiudad); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo $errors->first('idCiudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>
<?php /**PATH /home/dario/universidad/is/sprintcode/resources/views/asignatura/form.blade.php ENDPATH**/ ?>