@extends('templates.base')
@section('title', 'Asignación de Proyectos')
@section('subtitle', 'Crear Nueva Asignación')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Formularío de creación</span>
    </div>
    <div class="card-body">
        <form action="{{ route('project_users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="project_id" class="form-label">Proyecto</label>
                <select 
                    class="form-control @error('project_id') is-invalid @enderror" 
                    id="project_id" 
                    name="project_id" 
                    required>
                    <option value="">Seleccione un proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->title }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Usuario</label>
                <select 
                    class="form-control @error('user_id') is-invalid @enderror" 
                    id="user_id" 
                    name="user_id" 
                    required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <input type="text" 
                       class="form-control @error('role') is-invalid @enderror" 
                       id="role" 
                       name="role" 
                       value="{{ old('role') }}" 
                       required>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-end">
                <a href="{{ route('project_users.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
