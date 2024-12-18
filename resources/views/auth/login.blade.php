<link rel="stylesheet" href="../../css/register.css" type="text/css">
<title>SprintCode</title>
<link rel="icon" href="https://i.ibb.co/gWWr6tN/image-removebg-preview.png" type="image/x-icon">

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="container">
    <div class="heading">Sign In</div>

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
