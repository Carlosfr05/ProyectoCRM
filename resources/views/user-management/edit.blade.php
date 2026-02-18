@extends('layouts.app')

@section('content_header_title', 'Editar Usuario')

@section('content_body')

    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Volver</a>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group" id="passwordConfirmGroup" style="display: none;">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <label for="role">Rol <span class="text-danger">*</span></label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Usuario</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                    @error('role')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <hr>
                <p class="text-muted"><small><i class="fas fa-info-circle"></i> Creado: {{ $user->created_at->format('d/m/Y H:i') }} | Actualizado: {{ $user->updated_at->format('d/m/Y H:i') }}</small></p>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <script>
        // Mostrar campo de confirmación de contraseña solo si se ingresa contraseña
        document.getElementById('password').addEventListener('input', function() {
            document.getElementById('passwordConfirmGroup').style.display = this.value ? 'block' : 'none';
        });
    </script>

@stop
