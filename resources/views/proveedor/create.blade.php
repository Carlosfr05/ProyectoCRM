@extends('layouts.app')

@section('content_header_title', 'Nuevo Proveedor')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Proveedor</h3>
        </div>
        <form action="{{ route('proveedor.store') }}" method="POST">
            @include('proveedor._form')
        </form>
    </div>

@stop
