@extends('layouts.app')

@section('content_header_title', 'Empleados')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('empleado.create') }}" class="btn btn-primary">Nuevo Empleado</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($empleados as $e)
                        <tr>
                            <td>{{ $e->id }}</td>
                            <td>{{ $e->nombre }}</td>
                            <td>{{ $e->email }}</td>
                            <td>{{ $e->puesto ?? 'N/A' }}</td>
                            <td>${{ number_format($e->salario, 2) }}</td>
                            <td>
                                <a href="{{ route('empleado.show', $e->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('empleado.edit', $e->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('empleado.destroy', $e->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar empleado?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay empleados registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $empleados->links() }}
            </div>
        </div>
    </div>

@stop
