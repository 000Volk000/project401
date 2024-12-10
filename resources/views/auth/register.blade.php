<link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css">

<div class="container">
    <div class="heading">Registrarse</div>

    <!-- Display Validation Errors at the Top -->
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif

    @if ($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif


    <form method="POST" class="form" action="{{ route('register') }}">
        @csrf
        <input required class="input" type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
        <input required class="input" type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}">
        <input required class="input" type="password" name="password" id="password" placeholder="Contraseña">
        <input required class="input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña">
        <input required class="input" type="text" name="especialidad" id="especialidad" placeholder="Especialidad" value="{{ old('especialidad') }}">
        <select id="rol" class="input" name="rol" required>
            <option value="profesor" {{ old('rol') == 'profesor' ? 'selected' : '' }}>Profesor</option>
            <option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
        </select>
        <a class="forgot-password" href="{{ route('login') }}">¿Ya registrado?</a>
        <input class="login-button" type="submit" value="Registrarse">
    </form>
</div>

<?php /**
<x-guest-layout >
<form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div>
<x-input-label for="name" :value="__('Name')" />
<x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
<x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="mt-4">
<x-input-label for="email" :value="__('Email')" />
<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
<x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
<x-input-label for="password" :value="__('Password')" />
<x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
<x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
<x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

<!-- Especialidad -->
<div class="mt-4">
<x-input-label for="especialidad" :value="__('Especialidad')" />
<x-text-input id="especialidad" class="block mt-1 w-full" type="text" name="especialidad" :value="old('especialidad')" required autocomplete="especialidad" />
<x-input-error :messages="$errors->get('especialidad')" class="mt-2" />
</div>

<!-- Rol (Role) Dropdown -->
<div class="mt-4">
<x-input-label for="rol" :value="__('Role')" />
<select id="rol" name="rol" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" style="background: #111827; border-color: #374151; color: white;" required>
<option value="profesor" {{ old('rol') == 'profesor' ? 'selected' : '' }}>{{ __('Profesor') }}</option>
<option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>{{ __('Estudiante') }}</option>
</select>
<x-input-error :messages="$errors->get('rol')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
{{ __('Already registered?') }}
</a>

<x-primary-button class="ms-4">
{{ __('Register') }}
</x-primary-button>
</div>
</form>
</x-guest-layout>

