@extends('layouts.app')

@section('content_header_title', 'Ver Empleado')

@section('content_body')

    <a href="{{ route('empleado.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $empleado->nombre }}</h3>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                @if($empleado->foto)
                    <img src="{{ asset('storage/' . $empleado->foto) }}" alt="Foto de {{ $empleado->nombre }}" class="img-thumbnail" style="max-width: 300px;">
                @else
                    <img src="{{ asset('img/default-profile.png') }}" alt="Sin foto" class="img-thumbnail" style="max-width: 300px;">
                @endif
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $empleado->id }}</p>
                    <p><strong>Email:</strong> {{ $empleado->email ?? 'N/A' }}</p>
                    <p><strong>Teléfono:</strong> {{ $empleado->telefono ?? 'N/A' }}</p>
                    <p><strong>Puesto:</strong> {{ $empleado->puesto ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Salario:</strong> ${{ number_format($empleado->salario, 2) }}</p>
                    <p><strong>Fecha de Contratación:</strong> {{ $empleado->fecha_contratacion ? $empleado->fecha_contratacion->format('d/m/Y') : 'N/A' }}</p>
                    <p><strong>Creado:</strong> {{ $empleado->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Actualizado:</strong> {{ $empleado->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            @if($empleado->direccion)
                <hr>
                <p><strong>Dirección:</strong></p>
                <p>{{ $empleado->direccion }}</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('empleado.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar empleado?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

@stop
