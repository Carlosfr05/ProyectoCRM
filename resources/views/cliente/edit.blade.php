@extends('layouts.app')

@section('content_header_title', 'Editar Cliente')

@section('content_body')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('cliente._form')
            </form>
        </div>
    </div>

@stop
