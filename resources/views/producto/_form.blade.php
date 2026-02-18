@csrf

<div class="card card-default">
    <div class="card-body">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
            @error('nombre')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
            @error('descripcion')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $producto->sku ?? '') }}" required>
            @error('sku')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" value="{{ old('precio', $producto->precio ?? '') }}" required>
                @error('precio')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad', $producto->cantidad ?? '') }}" required>
                @error('cantidad')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria', $producto->categoria ?? '') }}">
            @error('categoria')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
