@csrf

<div class="card card-default">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre de Sucursal</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $sucursal->nombre ?? '') }}" required>
            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad', $sucursal->ciudad ?? '') }}">
                @error('ciudad')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado', $sucursal->estado ?? '') }}">
                @error('estado')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" id="direccion" class="form-control">{{ old('direccion', $sucursal->direccion ?? '') }}</textarea>
            @error('direccion')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="codigo_postal">Código Postal</label>
                <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" value="{{ old('codigo_postal', $sucursal->codigo_postal ?? '') }}">
                @error('codigo_postal')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $sucursal->email ?? '') }}">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $sucursal->telefono ?? '') }}">
            @error('telefono')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="horario_apertura">Horario de Apertura</label>
                <input type="time" name="horario_apertura" id="horario_apertura" class="form-control" value="{{ old('horario_apertura', $sucursal->horario_apertura ?? '') }}">
                @error('horario_apertura')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="horario_cierre">Horario de Cierre</label>
                <input type="time" name="horario_cierre" id="horario_cierre" class="form-control" value="{{ old('horario_cierre', $sucursal->horario_cierre ?? '') }}">
                @error('horario_cierre')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="gerente">Gerente</label>
            <input type="text" name="gerente" id="gerente" class="form-control" value="{{ old('gerente', $sucursal->gerente ?? '') }}">
            @error('gerente')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('sucursal.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
