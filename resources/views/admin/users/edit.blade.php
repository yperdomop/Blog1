@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Asignar un rol</h1>
        <div><a class="btn btn-link" href="{{ route('admin.users.index') }}"><u>Volver</u></a></div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{ $user->name }}</p>
            <p class="h5">Correo electrónico</p>
            <p class="form-control">{{ $user->email }}</p>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

            <h2 class="h5"> Listado de roles</h2>
            @foreach ($roles as $role)
                <div>
                    <label>

                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
