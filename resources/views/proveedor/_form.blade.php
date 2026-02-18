@csrf

<div class="card card-default">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $proveedor->nombre ?? '') }}" required>
            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" id="empresa" class="form-control" value="{{ old('empresa', $proveedor->empresa ?? '') }}">
            @error('empresa')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $proveedor->email ?? '') }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $proveedor->telefono ?? '') }}">
            @error('telefono')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" class="form-control">{{ old('direccion', $proveedor->direccion ?? '') }}</textarea>
            @error('direccion')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('proveedor.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
