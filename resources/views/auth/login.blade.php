@extends('layouts.app')

@section('content')
<style>
/* Estilos para el card */
.login-card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif; 
    font-size: 1.5rem;
    color: #333;
}

/* Estilo para los encabezados dentro del card */
.login-card .card-header {
    font-family: 'Lora', serif;
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    color: #007bff;
    letter-spacing: 1px;
    padding: 1rem 0;
}

/* Estilos para los textos del formulario */
.login-card .card-body {
    font-family: 'Roboto', sans-serif;
    font-size: 1.2rem;
    color: #555;
}

/* Estilo del contenedor donde está el botón */
.card-body {
    padding: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 40vh;
}

/* Estilo del botón de login */
.login-btn {
    background-color: #007bff;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    width: 60%;
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.login-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Mejorar la clase .mb-3 */
.mb-3 {
    margin-bottom: 0.01rem;
    font-family: 'Roboto', sans-serif;
    color: #333;
}

/* Estilo para la etiqueta de los campos de entrada */
.mb-3 label {
    font-size: 1.1rem;
    font-weight: bold;
    color: #555;
    display: block;
    margin-bottom: 0.01rem;
}

/* Estilo de los campos de entrada */
.mb-3 input.form-control {
    font-size: 0.8rem;
    padding: 0.8rem 1rem;
    border-radius: 10px;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Cambio de estilo cuando el campo de entrada tiene error */
.mb-3 input.form-control.is-invalid {
    border-color: #e74c3c;
    box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
}

/* Estilo para el texto de error */
.mb-3 .invalid-feedback {
    font-size: 0.875rem;
    color: #e74c3c;
    margin-top: 0.01rem;
}

/* Estilo cuando el campo de entrada es válido */
.mb-3 input.form-control:valid {
    border-color: #2ecc71;
    box-shadow: 0 0 5px rgba(46, 204, 113, 0.5);
}

.login-link {
    color: #007bff;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
}

.card-header {
    background-color: #f8f9fa;
    font-size: 2.5rem;
    font-weight: bold;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    color: #333;
    letter-spacing: 1px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    padding: 15px 0;
}

img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    border: 3px solid #007bff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    float: right;
    margin-top: -225px;
    margin-right: 105px;
}

img:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.container {
    padding-top: 40px;
}

.form-control {
    border-radius: 15px;
}
/* Estilos para el checkbox */
.form-check-input {
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 5px; /* Bordes redondeados */
    border: 2px solid #007bff; /* Borde azul */
    background-color: #fff; /* Fondo blanco */
    transition: background-color 0.3s ease, border-color 0.3s ease; /* Transiciones suaves */
}

/* Cuando el checkbox está marcado */
.form-check-input:checked {
    background-color: #007bff; /* Fondo azul cuando está marcado */
    border-color: #0056b3; /* Borde más oscuro cuando está marcado */
}

/* Estilo del label */
.form-check-label {
    font-size: 1.1rem; /* Fuente más grande */
    color: #555; /* Color de texto más suave */
    font-family: 'Roboto', sans-serif; /* Fuente moderna */
    font-weight: bold; /* Negrita para resaltar el texto */
    margin-left: -180px; /* Espaciado entre el checkbox y el texto */
}

/* Efecto hover para el checkbox */
.form-check-input:hover {
    border-color: #0056b3; /* Cambio de color del borde al pasar el mouse */
    background-color: #e9f0ff; /* Fondo más claro al hacer hover */
}

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card login-card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="login-btn">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="login-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<img src="https://cdn-icons-png.flaticon.com/512/17849/17849968.png" alt="">
@endsection
