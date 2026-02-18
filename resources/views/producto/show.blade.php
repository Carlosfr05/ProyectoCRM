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
                <div class="col-md-4 text-center">
                    @if($producto->foto)
                        <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto de {{ $producto->nombre }}" class="img-thumbnail" style="max-width: 300px;">
                    @else
                        <img src="{{ asset('img/product-default.png') }}" alt="Sin foto" class="img-thumbnail" style="max-width: 300px;">
                    @endif
                </div>
                <div class="col-md-8">
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

            @if($producto->adjunto)
                <hr>
                <div class="alert alert-info">
                    <i class="fas fa-file mr-2"></i>
                    <strong>Archivo Adjunto:</strong>
                    <a href="{{ asset('storage/' . $producto->adjunto) }}" class="btn btn-sm btn-primary ml-2" target="_blank">
                        <i class="fas fa-download mr-1"></i>Descargar
                    </a>
                </div>
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
