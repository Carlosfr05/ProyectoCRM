@extends('layouts.app')

@section('content_header_title', 'Nuevo Producto')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Producto</h3>
        </div>
        <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
            @include('producto._form')
        </form>
    </div>

@stop
