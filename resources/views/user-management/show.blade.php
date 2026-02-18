@extends('layouts.app')

@section('content_header_title', 'Ver Usuario')

@section('content_body')

    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Nombre:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Rol:</strong> 
                        <span class="badge badge-{{ $user->isAdmin() ? 'danger' : 'info' }}">
                            {{ $user->isAdmin() ? 'Administrador' : 'Usuario' }}
                        </span>
                    </p>
                    <p><strong>Creado:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Actualizado:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-2"></i>Editar
            </a>
            @if($user->id !== auth()->id())
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar usuario?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i>Eliminar
                    </button>
                </form>
            @endif
        </div>
    </div>

@stop
