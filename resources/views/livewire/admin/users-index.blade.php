<div>
    <div class="card">
        <div class="card-header">
            <div class="input-group">
                <input type="text" wire:model.live="search" class="form-control"
                    placeholder="Ingrese el nombre o correo de un usuario">
                <div class="input-group-append">
                    <span class="input-group-text search-icon" title="Buscar"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <ul>
                                        @foreach ($user->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td width="10px">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form {{--  id="delete-form-{{ $post->id }}"  --}} action="{{ route('admin.users.destroy', $user) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            onclick="confirmDelete({{ $user->id }})">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun registro con este nombre...</strong>
            </div>
        @endif
    </div>
    {{--  importar sweetalert  --}}
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function confirmDelete(userId) {
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

</div>
