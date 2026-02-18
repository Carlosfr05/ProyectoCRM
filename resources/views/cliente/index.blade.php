@extends('layouts.app')

@section('content_header_title', 'Clientes')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo Cliente</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ $c->telefono }}</td>
                            <td>
                                <a href="{{ route('cliente.show', $c->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('cliente.edit', $c->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('cliente.destroy', $c->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>

@stop
