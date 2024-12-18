<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
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

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>




<div class="container">
    <div class="heading">Register</div>

    <form method="POST" class="form" {{ route('register') }}">
    @csrf
    <input required="" class="input" type="name" name="name" id="name" placeholder="Name">
    <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
    <input required="" class="input" type="password" name="password" id="password" placeholder="Contraseña">
    <input required="" class="input" type="name" name="especialidad" id="especialidad" placeholder="Especialidad">
    <select id="rol" name="rol" class="input" style="color: rgb(170, 170, 170);"  required>
        <option value="profesor" {{ old('rol') == 'profesor' ? 'selected' : '' }}>{{ __('Profesor') }}</option>
        <option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>{{ __('Estudiante') }}</option>
    </select>
    <a class="forgot-password" href="{{ route('login') }}">¿Ya registrado?</a>
    <input class="login-button" type="submit" value="Registrarse">
    </form>
</div>

