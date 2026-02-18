@extends('layouts.app')

@section('content_header_title', 'Clientes')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content_body')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo Cliente</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" id="clientesTable">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $c)
                        <tr>
                            <td>
                                @if($c->foto)
                                    <img src="{{ asset('storage/' . $c->foto) }}" alt="Foto de {{ $c->nombre }}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('img/default-profile.png') }}" alt="Sin foto" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                @endif
                            </td>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ $c->telefono }}</td>
                            <td>
                                <a href="{{ route('cliente.show', $c->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('cliente.edit', $c->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                @if(auth()->user()->isAdmin())
                                    <form action="{{ route('cliente.destroy', $c->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>

@push('js')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#clientesTable').DataTable({
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
