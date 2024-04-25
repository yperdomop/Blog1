@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Editar rol</h1>
        <div><a class="btn btn-link" href="{{ route('admin.roles.index') }}"><u>Volver</u></a></div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  para que no me aparezca el autocompletado cuando escribo en el input  --}}

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop


@section('css')

@stop

@section('js')

@stop
