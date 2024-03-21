@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1>Como puedo ayudarte hoy?</h1>

        </div>
    </div>

@stop

@section('content')
    @livewire('admin.chatgpt-index')
@stop

@section('css')

@stop

@section('js')

@stop
