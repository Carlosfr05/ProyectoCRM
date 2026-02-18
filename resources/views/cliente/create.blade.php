@extends('layouts.app')

@section('content_header_title', 'Crear Cliente')

@section('content_body')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.store') }}" method="POST">
                @include('cliente._form')
            </form>
        </div>
    </div>

@stop
