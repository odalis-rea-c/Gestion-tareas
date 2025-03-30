@extends('layouts.app')

@section('content')

<style>
/* Colores principales */
:root {
    --primary-color: #007bff;
    --primary-hover-color: #0056b3;
    --background-color: #f8f9fa;
    --card-background-color: #e9ecef;
    --success-color: #28a745;
    --text-color: #333;
}

/* Tarjeta del dashboard */
.dashboard-card {
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: var(--card-background-color);
}

.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 24px rgba(0, 0, 0, 0.18);
}

/* Encabezado */
.dashboard-header {
    font-size: 2rem;
    font-weight: 700;
    background-color: var(--primary-color);
    color: white;
    text-align: center;
    padding: 1.5rem 0;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}

/* Mensaje principal */
.dashboard-message {
    font-size: 1.3rem;
    font-weight: 500;
    color: var(--text-color);
    margin-top: 1.5rem;
    text-align: center;
}

/* Botón */
.dashboard-btn {
    background-color: var(--primary-color);
    color: white;
    font-weight: 600;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    margin-top: 2rem;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: inline-block;
}

.dashboard-btn:hover {
    background-color: var(--primary-hover-color);
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

/* Cuerpo de la tarjeta */
.dashboard-card-body {
    padding: 2rem;
}

/* Alerta de éxito */
.dashboard-alert {
    border-radius: 8px;
    margin-bottom: 2rem;
}

.dashboard-alert-success {
    background-color: var(--success-color);
    color: white;
    padding: 1rem;
}

.dashboard-alert-success .btn-close {
    color: white;
}

/* Fondo general */
body {
    background-color: var(--background-color);
}
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dashboard-card shadow-lg">
                <div class="card-header dashboard-header">{{ __('Gestión de Tareas') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert dashboard-alert dashboard-alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <p class="dashboard-message">{{ __('¡Estás en la Gestión de Tareas!') }}</p>
                    <a href="http://localhost/gestionTareas/" class="btn dashboard-btn">{{ __('Ir a Inicio') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
