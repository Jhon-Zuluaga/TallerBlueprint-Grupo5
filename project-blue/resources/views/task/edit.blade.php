@extends('templates.base')
@section('title', 'Tareas')
@section('subtitle', 'Formulario para editar una tarea existente')

@section('content')
    <div class="card shadow-sm">
    
        <div class="card-body">
            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario de edición --}}
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Proyecto --}}
                <div class="mb-3">
                    <label for="project_id" class="form-label">Proyecto</label><br>
                    <select name="project_id" id="project_id" class="form-select" required>
                        <option value="" disable selected>Seleccione un proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" 
                                {{ $project->id == old('project_id', $task->project_id) ? 'selected' : '' }}>
                                {{ $project->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de la tarea</label>
                    <input type="text" name="name" id="name" class="form-control" 
                        value="{{ old('name', $task->name) }}" required>
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $task->description) }}</textarea>
                </div>

                {{-- Estado --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Estado</label><br>
                    <select name="status" id="status" class="form-select" required>
                        <option value="pendiente" {{ old('status', $task->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_progreso" {{ old('status', $task->status) == 'en_progreso' ? 'selected' : '' }}>En progreso</option>
                        <option value="completada" {{ old('status', $task->status) == 'completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                {{-- Fecha límite --}}
                <div class="mb-3">
                    <label for="due_date" class="form-label">Fecha límite</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" 
                        value="{{ old('due_date', date('Y-m-d', strtotime($task->due_date))) }}" required>
                </div>

                {{-- Botones --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
