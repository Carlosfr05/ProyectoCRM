@extends('layouts.app')

@section('content_header_title', 'Productos')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('producto.create') }}" class="btn btn-primary">Nuevo Producto</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>SKU</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->sku }}</td>
                            <td>${{ number_format($p->precio, 2) }}</td>
                            <td>{{ $p->cantidad }}</td>
                            <td>{{ $p->categoria ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('producto.show', $p->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('producto.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('producto.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>

@stop
