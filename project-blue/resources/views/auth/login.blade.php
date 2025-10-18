@extends('templates.auth')

@section('title', 'Project Blue - Iniciar Sesión')

@section('content')
<div class="login-card">
    <div class="logo">
        <span class="dot"></span>
        <h1>PROJECT BLUE</h1>
    </div>

    <h2>Bienvenido</h2>
    <p>Ingresa tu usuario y contraseña para iniciar sesion</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email" 
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" 
                   placeholder="Correo electrónico"
                   required>
            @error('email')
                <div class="invalid-feedback d-block text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <input type="password" 
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" 
                   placeholder="Contraseña"
                   required>
            @error('password')
                <div class="invalid-feedback d-block text-warning">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login">Ingresar</button>
    </form>
</div>
@endsection
