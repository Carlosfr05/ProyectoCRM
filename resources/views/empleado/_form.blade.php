@csrf

<div class="card card-default">
    <div class="card-body">
        <!-- Sección de Foto de Perfil -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h5 class="mb-3"><i class="fas fa-image mr-2"></i>Foto de Perfil</h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 text-center">
                <div class="position-relative">
                    @if(isset($empleado) && $empleado->foto)
                        <img id="fotoPreview" src="{{ asset('storage/' . $empleado->foto) }}" alt="Foto de perfil" style="width: 180px; height: 180px; border-radius: 10px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    @else
                        <img id="fotoPreview" src="{{ asset('img/default-profile.png') }}" alt="Foto de perfil" style="width: 180px; height: 180px; border-radius: 10px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="border-2 border-dashed p-4 text-center" style="border: 2px dashed #ccc; border-radius: 8px; background-color: #f9f9f9; cursor: pointer;" id="dropZone">
                    <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: #007bff;"></i>
                    <p class="mb-2"><strong>Haz clic o arrastra una imagen aquí</strong></p>
                    <p class="text-muted mb-3">PNG, JPG, JPEG o GIF (máximo 2MB)</p>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*" style="display: none;" onchange="previewFoto(event)">
                    <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('foto').click()">
                        <i class="fas fa-folder-open mr-2"></i>Seleccionar Imagen
                    </button>
                </div>
                @error('foto')
                    <div class="alert alert-danger mt-2 mb-0">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <hr>

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

<script>
    const dropZone = document.getElementById('dropZone');
    const fotoInput = document.getElementById('foto');

    // Drag and drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropZone.style.backgroundColor = '#e7f3ff';
        dropZone.style.borderColor = '#007bff';
    }

    function unhighlight(e) {
        dropZone.style.backgroundColor = '#f9f9f9';
        dropZone.style.borderColor = '#ccc';
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fotoInput.files = files;
        previewFoto({ target: { files: files } });
    }

    function previewFoto(event) {
        const file = event.target.files[0];
        if (file) {
            // Validar tamaño (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('El archivo es demasiado grande. Máximo 2MB.');
                return;
            }

            // Validar tipo
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Formato no válido. Use PNG, JPG, JPEG o GIF.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('fotoPreview').src = e.target.result;
                document.getElementById('fotoPreview').style.borderRadius = '10px';
                document.getElementById('fotoPreview').style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
            };
            reader.readAsDataURL(file);
        }
    }

    // Hover effect en zona de drop
    dropZone.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
    });
</script>
