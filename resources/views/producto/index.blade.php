@extends('layouts.app')

@section('content_header_title', 'Productos')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('producto.create') }}" class="btn btn-primary">Nuevo Producto</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" id="productosTable">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>SKU</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $p)
                        <tr>
                            <td>
                                @if($p->foto)
                                    <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto de {{ $p->nombre }}" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('img/product-default.png') }}" alt="Sin foto" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $p->id }}</td>
                            <td>
                                {{ $p->nombre }}
                                @if($p->adjunto)
                                    <i class="fas fa-paperclip" style="color: #007bff; margin-left: 5px;" title="Tiene archivo adjunto"></i>
                                @endif
                            </td>
                            <td>{{ $p->sku }}</td>
                            <td>${{ number_format($p->precio, 2) }}</td>
                            <td>{{ $p->cantidad }}</td>
                            <td>{{ $p->categoria ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('producto.show', $p->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('producto.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                @if(auth()->user()->isAdmin())
                                    <form action="{{ route('producto.destroy', $p->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>

@push('js')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#productosTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords":  "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>
@endpush

@stop
