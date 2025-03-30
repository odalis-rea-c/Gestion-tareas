@extends('layouts.app')

@section('content')

<style>
/* Mejorar el estilo de la tarjeta */
.card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
    max-width: 60000px; /* Aumentar el ancho de la tarjeta */
    margin: 0 auto; /* Centrar la tarjeta */
    height: auto; /* Altura automática para el contenido */
}

/* Imagen de encabezado */
.card-header-image {
    width: 100%;
    height: 150px; /* Reducir altura de la imagen */
    object-fit: cover;
    border-bottom: 4px solid #007bff; /* Borde en la parte inferior */
}

/* Encabezado estilizado */
.card-header {
    font-size: 1.5rem; /* Reducir tamaño del encabezado */
    font-weight: bold;
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 1rem;
}

/* Botón personalizado */
.custom-btn {
    background-color: #007bff;
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    text-transform: uppercase;
    padding: 0.8rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.custom-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Campos del formulario */
.form-control {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 0.75rem;
    font-size: 1rem; /* Aumentar tamaño de texto */
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

/* Estilo de mensajes de error */
.invalid-feedback {
    color: #e74c3c;
    font-size: 0.875rem;
}

/* Cajas de contenido */
.content-box {
    background-color: #f8f9fa;
    padding: 1rem; /* Reducir el padding */
    margin-bottom: 1rem; /* Reducir el margen inferior */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Centrado vertical */
.full-height {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Estilo adicional para el formulario */
.form-group {
    margin-bottom: 1rem; /* Reducir separación entre campos */
}

</style>

<div class="container full-height">
    <div class="row justify-content-center">
        <div class=""> <!-- Hacer la columna más ancha en pantallas grandes -->

            <div class="card shadow-lg border-0">
                <!-- Imagen de encabezado -->
                <img src="https://www.inabaweb.com/wp-content/uploads/2023/04/Tareas.png" alt="Header Image" class="card-header-image">

                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="content-box">
                        <p class="text-center fw-bold">¡Únete a nuestra comunidad! Regístrate para gestionar tus tareas.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="fw-bold">{{ __('Name') }}</label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" 
                                   required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="fw-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" 
                                   required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="fw-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="fw-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" 
                                   class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary custom-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
