@extends('adminlte::page')

@section('title', 'Prueba')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Crear Categoria</h1>
        <div><a class="btn btn-link" href="{{ route('admin.categories.index') }}"><u>Volver</u></a></div>
    @stop

    @section('content')
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.categories.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, [
                        'class' => 'form-control',
                        'placeholder' => 'Ingrese el slug de la categoría',
                        'readonly',
                    ]) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                {!! Form::submit('Crear  Categoría', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}

            </div>
        </div>
    @stop
    @section('js')

        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });
        </script>

    @endsection
