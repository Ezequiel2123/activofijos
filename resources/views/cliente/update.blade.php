{{--Heredemos la estructura del archivo app.blade.php--}}

@extends('layouts.app')

{{--Definimos el titulo--}}
@section('title', 'Cliente')

{{--DEfinimos el contenido--}}
@section('content')
    
<h1>Actualizar</h1>
<h5>Formulario para actualizar</h5>
<hr>
<form class="row g-3" action="/cliente/update/{{$cliente->codigo}}" method="POST">
  @csrf
 @method('PUT')  
  <div class="col-md-6">
        <label for="inputPassword4" class="form-label">nombre</label>
        <input type="text"name="nombre" value="{{$cliente->nombre}}"  class="form-control" id="inputPassword4">
        @error('nombre') 
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{$message}}</strong>
         </span> 
         @enderror 
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">edad</label>
        <input type="number" name="edad" value="{{$cliente->edad}}" class="form-control" id="inputAddress" placeholder="">
        @error('edad') 
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{$message}}</strong>
        </span> 
        @enderror 
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">categoria 2</label>
        <select name="categoria" id="" class="form-control">
          @foreach ($categorias as $item) 
          <option value="{{$item->codigo}}" {{(($item->codigo==$cliente->categoria)?'selected':'')}}>{{$item->nombre}}</option>
          @endforeach 
          </select>
          @error('categoria') 
          <span class="invalid-feedback d-block" role="alert">
          <strong>{{$message}}</strong>
          </span> 
          @enderror     
         </div>
         <button class="btn btn-primary">Guardar</button>

 
@endsection