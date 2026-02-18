@extends('layouts.app')

@section('content_header_title', 'Ver Producto')

@section('content_body')

    <a href="{{ route('producto.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $producto->nombre }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <strong>ID:</strong> {{ $producto->id }}
                    </p>
                    <p>
                        <strong>SKU:</strong> {{ $producto->sku }}
                    </p>
                    <p>
                        <strong>Nombre:</strong> {{ $producto->nombre }}
                    </p>
                    <p>
                        <strong>Categoría:</strong> {{ $producto->categoria ?? 'N/A' }}
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}
                    </p>
                    <p>
                        <strong>Cantidad en Stock:</strong> {{ $producto->cantidad }}
                    </p>
                    <p>
                        <strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p>
                        <strong>Actualizado:</strong> {{ $producto->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>

            @if($producto->descripcion)
                <hr>
                <p>
                    <strong>Descripción:</strong>
                </p>
                <p>{{ $producto->descripcion }}</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar producto?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

@stop
