@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}">Agregar categoría</a>
    <h1>Lista de categorias</h1>
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
                        <th>Name</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop


@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén una lista de todos los botones con la clase 'btn-delete'
            var deleteButtons = document.querySelectorAll('.btn-delete');

            // Agrega un event listener a cada botón
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    // Detiene el evento predeterminado del botón
                    event.preventDefault();

                    // Muestra la alerta de confirmación
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: '¡No podrás revertir esto!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminarlo'
                    }).then((result) => {
                        // Si se hace clic en el botón de confirmación, envía el formulario manualmente
                        if (result.isConfirmed) {
                            var form = button.closest('form');
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@stop
