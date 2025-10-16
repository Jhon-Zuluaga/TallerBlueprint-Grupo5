@extends('templates.base')
@section('title', 'Tareas')
@section('subtitle', 'Listado de Tareas')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary ">Crear</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Proyecto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Fecha límite</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->project->title ?? '—' }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description}}</td>
                            <td>{{ $task->status}}</td>
                            <td>{{ $task->due_date}}</td>

                            <td>
                                <!-- Ver Detalle -->
                                <a href="#" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                    data-toggle="modal" data-target="#modalShow{{ $task->id }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <!-- Editar -->
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <!-- Eliminar -->
                                <form id="form-delete-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Modal Detalle -->
                            <div class="modal fade modal-mini modal-primary" id="modalShow{{ $task->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $task->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <h5>Detalle de la Tarea</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ID:</strong> {{ $task->id }}</p>
                                            <p><strong>Proyecto:</strong> {{ $task->project->title ?? '—' }}</p>
                                            <p><strong>Nombre:</strong> {{ $task->name }}</p>
                                            <p><strong>Descripción:</strong> {{ $task->description }}</p>
                                            <p><strong>Estado:</strong> {{ ucfirst(str_replace('_', ' ', $task->status)) }}</p>
                                            <p><strong>Fecha límite:</strong> {{ $task->due_date ? date('Y-m-d', strtotime($task->due_date)) : 'No especificada' }}</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
