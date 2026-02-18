@extends('layouts.app')

@section('content_header_title', 'Ver Sucursal')

@section('content_body')

    <a href="{{ route('sucursal.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $sucursal->nombre }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $sucursal->id }}</p>
                    <p><strong>Ciudad:</strong> {{ $sucursal->ciudad ?? 'N/A' }}</p>
                    <p><strong>Estado:</strong> {{ $sucursal->estado ?? 'N/A' }}</p>
                    <p><strong>Código Postal:</strong> {{ $sucursal->codigo_postal ?? 'N/A' }}</p>
                    <p><strong>Teléfono:</strong> {{ $sucursal->telefono ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $sucursal->email ?? 'N/A' }}</p>
                    <p><strong>Horario Apertura:</strong> {{ $sucursal->horario_apertura ?? 'N/A' }}</p>
                    <p><strong>Horario Cierre:</strong> {{ $sucursal->horario_cierre ?? 'N/A' }}</p>
                    <p><strong>Gerente:</strong> {{ $sucursal->gerente ?? 'N/A' }}</p>
                    <p><strong>Creado:</strong> {{ $sucursal->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            @if($sucursal->direccion)
                <hr>
                <p><strong>Dirección:</strong></p>
                <p>{{ $sucursal->direccion }}</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('sucursal.edit', $sucursal->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('sucursal.destroy', $sucursal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar sucursal?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

@stop
