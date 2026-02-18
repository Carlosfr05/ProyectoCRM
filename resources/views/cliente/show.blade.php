@extends('layouts.app')

@section('content_header_title', 'Ver Cliente')

@section('content_body')

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $cliente->id }}</p>
            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>Email:</strong> {{ $cliente->email }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>

            <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

@stop
