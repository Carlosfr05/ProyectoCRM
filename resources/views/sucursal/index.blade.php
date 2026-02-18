@extends('layouts.app')

@section('content_header_title', 'Sucursales')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('sucursal.create') }}" class="btn btn-primary">Nueva Sucursal</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Gerente</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sucursales as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->nombre }}</td>
                            <td>{{ $s->ciudad ?? 'N/A' }}</td>
                            <td>{{ $s->gerente ?? 'N/A' }}</td>
                            <td>{{ $s->telefono }}</td>
                            <td>{{ $s->email ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('sucursal.show', $s->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('sucursal.edit', $s->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('sucursal.destroy', $s->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar sucursal?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay sucursales registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $sucursales->links() }}
            </div>
        </div>
    </div>

@stop
