@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Cliente')

{{-- Definimos el contenido --}}
@section('content')
    
<h1>Actualizar</h1>
<h5>Formulario para actualizar</h5>
<hr>
<form class="row g-3" action="/categoria/update/{{$categoria->codigo}}" method="POST">
  @csrf
  @method('PUT')  
  <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Nombre</label>
      <input type="text" name="nombre" value="{{$categoria->nombre}}" class="form-control" id="inputPassword4">
      @error('nombre') 
      <span class="invalid-feedback d-block" role="alert">
        <strong>{{$message}}</strong>
      </span> 
      @enderror 
  </div>

  <button type="submit" class="btn btn-dark">Actualizar</button>
</form>

@endsection
