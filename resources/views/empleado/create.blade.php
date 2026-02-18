@extends('layouts.app')

@section('content_header_title', 'Nuevo Empleado')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Empleado</h3>
        </div>
        <form action="{{ route('empleado.store') }}" method="POST">
            @include('empleado._form')
        </form>
    </div>

@stop
