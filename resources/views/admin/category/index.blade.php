@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.categories.create') }}">Agregar Categoria</a>
        </div>
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
    <!-- Incluye SweetAlert2 en tu página (asegúrate de incluirlo antes de este script) -->
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
