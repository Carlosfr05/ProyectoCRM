@extends('layouts.app')

@section('content_header_title', 'Ver Proveedor')

@section('content_body')

    <a href="{{ route('proveedor.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $proveedor->nombre }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $proveedor->id }}</p>
                    <p><strong>Empresa:</strong> {{ $proveedor->empresa ?? 'N/A' }}</p>
                    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $proveedor->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
                    <p><strong>Creado:</strong> {{ $proveedor->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            @if($proveedor->direccion)
                <hr>
                <p><strong>Dirección:</strong></p>
                <p>{{ $proveedor->direccion }}</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar proveedor?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

@stop
