<link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>" type="text/css">

<div class="container">
    <div class="heading">Registrarse</div>

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


    <form method="POST" class="form" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <input required class="input" type="text" name="name" id="name" placeholder="Nombre" value="<?php echo e(old('name')); ?>">
        <input required class="input" type="email" name="email" id="email" placeholder="E-mail" value="<?php echo e(old('email')); ?>">
        <input required class="input" type="password" name="password" id="password" placeholder="Contraseña">
        <input required class="input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña">
        <input required class="input" type="text" name="especialidad" id="especialidad" placeholder="Especialidad" value="<?php echo e(old('especialidad')); ?>">
        <select id="rol" class="input" name="rol" required>
            <option value="profesor" <?php echo e(old('rol') == 'profesor' ? 'selected' : ''); ?>>Profesor</option>
            <option value="estudiante" <?php echo e(old('rol') == 'estudiante' ? 'selected' : ''); ?>>Estudiante</option>
        </select>
        <a class="forgot-password" href="<?php echo e(route('login')); ?>">¿Ya registrado?</a>
        <input class="login-button" type="submit" value="Registrarse">
    </form>
</div>

<?php /**
@component('App\View\Components\GuestLayout', 'guest-layout', [])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'name','value' => __('Name')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Name'))]); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'text-input', ['view' => 'components.text-input','data' => ['id' => 'name','class' => 'block mt-1 w-full','type' => 'text','name' => 'name','value' => old('name'),'required' => true,'autofocus' => true,'autocomplete' => 'name']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','class' => 'block mt-1 w-full','type' => 'text','name' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('name')),'required' => true,'autofocus' => true,'autocomplete' => 'name']); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('name'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('name')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<!-- Email Address -->
<div class="mt-4">
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'email','value' => __('Email')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email'))]); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'text-input', ['view' => 'components.text-input','data' => ['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => old('email'),'required' => true,'autocomplete' => 'username']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email')),'required' => true,'autocomplete' => 'username']); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<!-- Password -->
<div class="mt-4">
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'password','value' => __('Password')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Password'))]); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'text-input', ['view' => 'components.text-input','data' => ['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'new-password']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'new-password']); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<!-- Confirm Password -->
<div class="mt-4">
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'password_confirmation','value' => __('Confirm Password')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password_confirmation','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirm Password'))]); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'text-input', ['view' => 'components.text-input','data' => ['id' => 'password_confirmation','class' => 'block mt-1 w-full','type' => 'password','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password_confirmation','class' => 'block mt-1 w-full','type' => 'password','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password']); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('password_confirmation'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<!-- Especialidad -->
<div class="mt-4">
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'especialidad','value' => __('Especialidad')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'especialidad','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Especialidad'))]); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'text-input', ['view' => 'components.text-input','data' => ['id' => 'especialidad','class' => 'block mt-1 w-full','type' => 'text','name' => 'especialidad','value' => old('especialidad'),'required' => true,'autocomplete' => 'especialidad']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'especialidad','class' => 'block mt-1 w-full','type' => 'text','name' => 'especialidad','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('especialidad')),'required' => true,'autocomplete' => 'especialidad']); ?>
@endComponentClass
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('especialidad'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('especialidad')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<!-- Rol (Role) Dropdown -->
<div class="mt-4">
@component('Illuminate\View\AnonymousComponent', 'input-label', ['view' => 'components.input-label','data' => ['for' => 'rol','value' => __('Role')]])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'rol','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Role'))]); ?>
@endComponentClass
<select id="rol" name="rol" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" style="background: #111827; border-color: #374151; color: white;" required>
<option value="profesor" {{ old('rol') == 'profesor' ? 'selected' : '' }}>{{ __('Profesor') }}</option>
<option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>{{ __('Estudiante') }}</option>
</select>
@component('Illuminate\View\AnonymousComponent', 'input-error', ['view' => 'components.input-error','data' => ['messages' => $errors->get('rol'),'class' => 'mt-2']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('rol')),'class' => 'mt-2']); ?>
@endComponentClass
</div>

<div class="flex items-center justify-end mt-4">
<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
{{ __('Already registered?') }}
</a>

@component('Illuminate\View\AnonymousComponent', 'primary-button', ['view' => 'components.primary-button','data' => ['class' => 'ms-4']])
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-4']); ?>
{{ __('Register') }}
 @endComponentClass
</div>
</form>
 @endComponentClass

 ?><?php /**PATH C:\xampp\htdocs\laravel\sprintcode\resources\views/auth/register.blade.php ENDPATH**/ ?>