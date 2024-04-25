@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de usuarios</h1>
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
    @livewire('admin.users-index')
@stop

@section('css')

@stop

@section('js')

@stop
