@extends('layouts.app')

@section('content_header_title', 'Cambiar Contraseña')

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cambiar Contraseña</h3>
                </div>
                <form action="{{ route('profile.update-password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password">Contraseña Actual</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                            @error('current_password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="password">Nueva Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="alert alert-info">
                            <small>La contraseña debe tener al menos 8 caracteres.</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
