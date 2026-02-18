@extends('layouts.app')

@section('content_header_title', 'Editar Producto')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Producto</h3>
        </div>
        <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('producto._form')
        </form>
    </div>

@stop
