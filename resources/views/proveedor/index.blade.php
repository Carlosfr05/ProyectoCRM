@extends('layouts.app')

@section('content_header_title', 'Proveedores')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->empresa ?? 'N/A' }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telefono }}</td>
                            <td>
                                <a href="{{ route('proveedor.show', $p->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('proveedor.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('proveedor.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar proveedor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay proveedores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $proveedores->links() }}
            </div>
        </div>
    </div>

@stop
