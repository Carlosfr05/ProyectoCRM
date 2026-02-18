@csrf

<div class="card card-default">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre ?? '') }}">
            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono ?? '') }}">
            @error('telefono')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" class="form-control">{{ old('direccion', $cliente->direccion ?? '') }}</textarea>
            @error('direccion')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
