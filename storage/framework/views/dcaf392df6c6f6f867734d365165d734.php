<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombreCiudad" class="form-label"><?php echo e(__('Nombre Ciudad')); ?></label>
            <input type="text" name="nombreCiudad" class="form-control <?php $__errorArgs = ['nombreCiudad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombreCiudad', $destino?->nombreCiudad)); ?>" id="nombreCiudad" placeholder="Nombre Ciudad">
            <?php echo $errors->first('nombreCiudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

        <div class="form-group mb-2 mb20">
            <label class="form-label"><?php echo e(__('Nombre Universidad')); ?></label>
                <input type="text" name="nombreUniversidad" class="form-control <?php $__errorArgs = ['nombreUniversidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombreUniversidad', $destino?->nombreUniversidad)); ?>" id="nombreUniversidad" placeholder="Nombre Universidad">
            <?php echo $errors->first('nombreUniversidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

        <div class="form-group mb-2 mb20">
            <label class="form-label"><?php echo e(__('Especialidad')); ?></label>
            <input type="text" name="especialidad" class="form-control <?php $__errorArgs = ['especialidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('especialidad', $destino?->especialidad)); ?>" id="especialidad" placeholder="Especialidad">
            <?php echo $errors->first('especialidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/sprintcode/resources/views/destino/form.blade.php ENDPATH**/ ?>