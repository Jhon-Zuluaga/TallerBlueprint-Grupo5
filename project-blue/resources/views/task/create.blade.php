@extends('templates.base')
@section('title', 'Tareas')
@section('subtitle', 'Crear Tareas')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Nueva Tarea</h5>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm">
                        <i class="nc-icon nc-minimal-left"></i> Volver
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        {{-- Proyecto --}}
                        <div class="form-group mb-3">
                            <label for="project_id">Proyecto</label>
                            <select name="project_id" id="project_id" class="form-control" required>
                                <option value="">Seleccione un proyecto</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nombre --}}
                        <div class="form-group mb-3">
                            <label for="name">Nombre de la tarea</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Ej: Diseñar interfaz principal"
                                   value="{{ old('name') }}" required>
                        </div>

                        {{-- Descripción --}}
                        <div class="form-group mb-3">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                      placeholder="Detalle de la tarea...">{{ old('description') }}</textarea>
                        </div>

                        {{-- Estado --}}
                        <div class="form-group mb-3">
                            <label for="status">Estado</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Seleccione un estado</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="en_progreso">En progreso</option>
                                <option value="completada">Completada</option>
                            </select>
                        </div>

                        {{-- Fecha de entrega --}}
                        <div class="form-group mb-4">
                            <label for="due_date">Fecha de entrega</label>
                            <input type="date" name="due_date" id="due_date" class="form-control"
                                   value="{{ old('due_date') }}" required>
                        </div>  

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="nc-icon nc-check-2"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
