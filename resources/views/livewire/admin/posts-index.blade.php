<div class="card">
    <div class="card-header">
        <div class="input-group">
            <input type="text" wire:model.live="search" class="form-control" placeholder="Ingrese el nombre del posts">
            <div class="input-group-append">
                <span class="input-group-text search-icon" title="Buscar"><i class="fa fa-search"></i></span>
            </div>
        </div>
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->statusText }}</td> {{--  con text me devuelve el nombre no el numero  --}}
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form id="delete-form-{{ $post->id }}"
                                    action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        onclick="confirmDelete({{ $post->id }})">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
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
