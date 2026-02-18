@extends('layouts.app')

@section('content_header_title', 'Ver Cliente')

@section('content_body')

    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                @if($cliente->foto)
                    <img src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto de {{ $cliente->nombre }}" class="img-thumbnail" style="max-width: 300px;">
                @else
                    <img src="{{ asset('img/default-profile.png') }}" alt="Sin foto" class="img-thumbnail" style="max-width: 300px;">
                @endif
            </div>

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
