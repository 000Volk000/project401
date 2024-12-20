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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombreCiudad', $destinosel?->nombreCiudad)); ?>" id="nombreCiudad" placeholder="Nombre Ciudad">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombreUniversidad', $destinosel?->nombreUniversidad)); ?>" id="nombreUniversidad" placeholder="Nombre Universidad">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('especialidad', $destinosel?->especialidad)); ?>" id="especialidad" placeholder="Especialidad">
            <?php echo $errors->first('especialidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

        <div class="form-group mb-2 mb20">
            <label for="plan" class="form-label"><?php echo e(__('Plan de convalidación')); ?></label>
            <select name="plan" class="form-control <?php $__errorArgs = ['plan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="plan">
                <option value="" disabled selected>
                    <?php if($destinosel->plan): ?>
                        <?php echo e($destinosel->plan); ?>

                    <?php else: ?>
                        ------------------
                    <?php endif; ?>
                </option>
                <option value="1 cuatrimestre" <?php echo e(old('plan', $destinosel->plan) == '1 cuatrimestre' ? 'selected' : ''); ?>>
                    1 cuatrimestre
                </option>
                <option value="Curso completo" <?php echo e(old('plan', $destinosel->plan) == 'Curso completo' ? 'selected' : ''); ?>>
                    Curso completo
                </option>
            </select>
            <?php echo $errors->first('plan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/sprintcode/resources/views/destino/form.blade.php ENDPATH**/ ?>