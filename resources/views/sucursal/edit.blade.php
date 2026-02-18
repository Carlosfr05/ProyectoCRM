@extends('layouts.app')

@section('content_header_title', 'Editar Sucursal')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Sucursal</h3>
        </div>
        <form action="{{ route('sucursal.update', $sucursal->id) }}" method="POST">
            @method('PUT')
            @include('sucursal._form')
        </form>
    </div>

@stop
