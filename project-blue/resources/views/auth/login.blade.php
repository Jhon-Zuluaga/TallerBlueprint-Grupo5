@extends('templates.base')
@section('title', 'Login')
@section('subtitle', 'Acceso al Sistema')

@section('content')
<div class="card">
    <div class="card-header">
        <span>Iniciar Sesión</span>
    </div>
    <div class="card-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required>
                
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password" 
                       name="password" 
                       required>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</div>
@endsection