@extends('templates.base')
@section('title', 'Asignaciones de Proyecto')
@section('subtitle', 'Listado')
@section('content')
    @include('templates.messages')

    <div class="row col-lg-12">
        <div class="d-flex justify-content-end col-12">
            <a href="{{ route('project_users.create') }}" class="btn btn-primary ">Crear</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_data" class="table table-hover table-striped table-responsive"> 
                <thead>
                    <th>ID</th>
                    <th>Proyecto</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($project_Users as $project_user)
                        <tr>
                            <td>{{ $project_user['id'] }}</td>
                            <td>{{ $project_user['project_id'] }}</td>
                            <td>{{ $project_user['user_id'] }}</td>
                            <td>{{ $project_user['role'] }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                data-toggle="modal" data-target="#modalShow{{ $project_user['id'] }}">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </a>
                                <a href="{{ route('project_users.edit', $project_user['id']) }}" class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                    <i class="nc-icon nc-tap-01"></i>
                                </a>
                                <form id="form-delete-{{ $project_user['id'] }}" action="{{ route('project_users.destroy', $project_user['id']) }}" method="POST" class="d-inline"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return remove();" class="btn btn-danger btn-fill btn-sm mr-2" title="Eliminar">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button> 
                                </form>
                            </td>

                            <!-- Modal -->
                              <div class="modal fade modal-mini modal-primary" id="modalShow{{ $project_user['id'] }}"
                              tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <h5>Detalle</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>ID:</strong> {{ $project_user['id'] }}</p>
                                        <p><strong>ID Proyecto:</strong> {{ $project_user['project_id'] }}</p>
                                        <p><strong>ID Usuario:</strong> {{ $project_user['user_id'] }}</p>
                                        <p><strong>Rol:</strong> {{ $project_user['role'] }}</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                              </div>
                              </div>
                            <!-- Fin modal -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
