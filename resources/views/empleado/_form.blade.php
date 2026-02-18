@csrf

<div class="card card-default">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $empleado->nombre ?? '') }}" required>
            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $empleado->email ?? '') }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="puesto">Puesto</label>
            <input type="text" name="puesto" id="puesto" class="form-control" value="{{ old('puesto', $empleado->puesto ?? '') }}">
            @error('puesto')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="salario">Salario</label>
                <input type="number" name="salario" id="salario" class="form-control" step="0.01" value="{{ old('salario', $empleado->salario ?? '') }}">
                @error('salario')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="fecha_contratacion">Fecha de Contratación</label>
                <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" value="{{ old('fecha_contratacion', $empleado->fecha_contratacion ?? '') }}">
                @error('fecha_contratacion')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $empleado->telefono ?? '') }}">
            @error('telefono')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" class="form-control">{{ old('direccion', $empleado->direccion ?? '') }}</textarea>
            @error('direccion')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('empleado.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
