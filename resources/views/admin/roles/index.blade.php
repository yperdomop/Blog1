@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}">Crear nuevo rol</a>
    <h1>Lista de roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form id="delete-form-{{ $role->id }}"
                                    action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        onclick="confirmDelete({{ $role->id }})">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

{{--  importar sweetalert  --}}
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        }
    </script>
@endsection

@section('css')

@stop
