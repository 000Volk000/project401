<link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>" type="text/css">

<!-- Session Status -->
<?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>

<div class="container">
    <div class="heading">Sign In</div>

    <!-- Display Validation Errors at the Top -->
    <?php if($errors->has('email')): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first('email')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->has('password')): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first('password')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" class="form" <?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
        <input required="" class="input" type="password" name="password" id="password" placeholder="Contraseña">
        <?php if(Route::has('password.request')): ?>
            <a class="forgot-password" href="<?php echo e(route('password.request')); ?>">¿Contraseña olvidada?</a>
        <?php endif; ?>
        <a class="register-link" href="<?php echo e(route('register')); ?>">Registrarse</a>
        <input class="login-button" type="submit" value="Sign In">

    </form>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\sprintcode\resources\views/auth/login.blade.php ENDPATH**/ ?>