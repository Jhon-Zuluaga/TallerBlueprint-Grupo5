@extends('templates.base')
@section('title', 'Tareas')
@section('subtitle', 'Formulario para editar una tarea existente')

@section('content')
     <div class="row p-2">
        <div class="col-lg-12">
            <form action="{{ route('tasks.update', $task['id']) }}" method="POST">
                @csrf
                @method('PUT')
                  {{-- Proyecto --}}
                        <div class="row col-lg-12">
                            <label for="project_id">Proyecto</label>
                            <select name="project_id" id="project_id" class="form-control" required>
                        <option value="" disable selected>Seleccione un proyecto</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" 
                                {{ $project->id == old('project_id', $task->project_id) ? 'selected' : '' }}>
                                {{ $project->title }}
                            </option>
                        @endforeach
                    </select>
                        </div>
                <div class="row col-lg-12">
                    <label for="description">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name"
                    value="{{ old('name', $task->name) }}" required>
                </div>
                <div class="row col-lg-12">
                    <label for="description">Descripcion:</label>
                    <input type="text" class="form-control" name="description" id="description"
                    value="{{ old('description', $task->description) }}" required>
                </div>
                <div class="row col-lg-12">
                    <label for="status">Estado</label>
                            <select name="status" id="status" class="form-control" required>
                        <option value="pendiente" {{ old('status', $task->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="completada" {{ old('status', $task->status) == 'completada' ? 'selected' : '' }}>Completada</option>
                        <option value="cancelada" {{ old('status', $task->status) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                 <div class="row col-lg-12">
                            <label for="due_date">Fecha de entrega</label>
                            <input type="date" name="due_date" id="due_date" class="form-control"
                                   value="{{ old('due_date', date('Y-m-d', strtotime($task->due_date))) }}" required>
                </div>  

            
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success btn-block btn-fill">Actualizar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-block btn-fill">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
        
@endsection
