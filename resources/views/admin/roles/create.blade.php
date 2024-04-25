@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{--  para que no me aparezca el autocompletado cuando escribo en el input  --}}
            {!! Form::open(['route' => 'admin.roles.store']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Crear rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
