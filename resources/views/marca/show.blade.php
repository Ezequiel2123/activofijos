{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Marcas')

{{-- Definimos el contenido --}}
@section('content')
    <h1>Marcas</h1>
    <h5>Listado de marcas</h5>
    <hr>
    {{-- Botón para ir al formulario de agregar marca --}}
    <a class="btn btn-danger btn-sm" href="/marca/create">Agregar nueva marca</a>
    <table class="table table-hover table-bordered mt-2">
        <tr>
            <td>Código</td>
            <td>Nombre</td>
            <td>Acciones</td>
        </tr>
        {{-- Listado de marcas --}}
        @foreach ($marcas as $item)
            <tr>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="/marca/edit/{{ $item->codigo }}">Modificar</a>
                    <button class="btn btn-danger btn-sm" url="/marca/destroy/{{ $item->codigo }}" onclick="destroy(this)"
                        token="{{ csrf_token() }}">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/product.js') }}"></script>
@endsection
