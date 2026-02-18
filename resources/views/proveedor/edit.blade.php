@extends('layouts.app')

@section('content_header_title', 'Editar Proveedor')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Proveedor</h3>
        </div>
        <form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
            @method('PUT')
            @include('proveedor._form')
        </form>
    </div>

@stop
