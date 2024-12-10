<link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css">

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container">
    <div class="heading">Sign In</div>
    <form method="POST" class="form" {{ route('login') }}">
        @csrf
        <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
        <input required="" class="input" type="password" name="password" id="password" placeholder="Contraseña">
        @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">¿Contraseña olvidada?</a>
        @endif
        <a class="register-link" href="{{ route('register') }}">Registrarse</a>
        <input class="login-button" type="submit" value="Sign In">

    </form>
</div>
