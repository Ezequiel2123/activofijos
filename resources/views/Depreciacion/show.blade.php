{{--Heredemos la estructura del archivo app.blade.php--}}

@extends('layouts.app')

{{--Definimos el titulo--}}
@section('title', 'Cliente')

{{--DEfinimos el contenido--}}
@section('content')
    
<h5>tabla de Depreciacion</h5>
<br>
<a class="btn btn-danger btn-sm" href="/cliente/create">Agregar una nueva Depreciacion</a>

<hr>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">año</th>
        <th scope="col">valor_depreciacion</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
    </tbody>
  </table>

  
@endsection
@section('scripts') 
 {{-- SweetAlert --}}
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- JS --}}
 <script src="{{ asset('js/cliente.js') }}"></script>
@endsection