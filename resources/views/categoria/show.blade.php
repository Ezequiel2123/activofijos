{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app') 
{{-- Definimos el título --}}
@section('title', 'categoria') 
{{-- Definimos el contenido --}}
@section('content') 
 <h1>Departamentos</h1>
 <h5>Listado de Departamentos</h5>
 <hr>
 {{-- Botón para ir al formulario de agregar producto --}}
 <a class="btn btn-danger btn-sm" href="/categoria/create">Agregar nuevo departamento</a>
 <table class="table table-hover table-bordered mt-2">
 <tr>
 <td>Código</td>
 <td>Nombre</td>
 <td>Acciones</td>
 </tr>
 {{-- Listado de productos --}}
 @foreach ($categorias as $item) 
 <tr>
 <td>{{ $item->codigo }}</td>
 <td>{{ $item->nombre }}</td>

 <td>
<a class="btn btn-success btn-sm" href="/categoria/edit/{{$item->codigo}}">Modificar</a>
<button class="btn btn-danger btn-sm" url="/categoria/destroy/{{$item->codigo}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</a>
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