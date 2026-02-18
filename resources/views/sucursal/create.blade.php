@extends('layouts.app')

@section('content_header_title', 'Nueva Sucursal')

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crear Sucursal</h3>
        </div>
        <form action="{{ route('sucursal.store') }}" method="POST">
            @include('sucursal._form')
        </form>
    </div>

@stop
