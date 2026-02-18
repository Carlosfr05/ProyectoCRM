@extends('layouts.app')

@section('content_header_title', 'Mi Perfil')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información Personal</h3>
                </div>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información de Cuenta</h3>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ Auth::user()->id }}</p>
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Miembro desde:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('profile.change-password') }}" class="btn btn-warning">Cambiar Contraseña</a>
                </div>
            </div>
        </div>
    </div>

@stop
