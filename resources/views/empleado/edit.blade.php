@extends('layouts.app')

@section('content_header_title', 'Editar Empleado')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Empleado</h3>
        </div>
        <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
            @method('PUT')
            @include('empleado._form')
        </form>
    </div>

@stop
