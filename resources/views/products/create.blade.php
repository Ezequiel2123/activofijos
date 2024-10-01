
{{--Heredemos la estructura del archivo app.blade.php--}}

@extends('layouts.app')

{{--Definimos el titulo--}}
@section('title', 'Productos')

{{--DEfinimos el contenido--}}
@section('content')
<h1>Crear</h1>

<h5>Formulario para crear productos</h5>
<hr>
<div class="container">
    <form class="row g-3" action="/products/store" method="POST" >
      @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">nombre</label>
          <input type="text" name="nombre" class="form-control" id="inputEmail4">
          @error('nombre')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
   
        <div class="col-12">
          <label for="inputAddress" class="form-label">precio</label>
          
          <input type="text" name="precio" class="form-control" id="inputAddress" placeholder="1234 Main St">
          @error('precio')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
      
        <div class="col-md-4">
          <label for="inputState" class="form-label">marca</label>
          <select id="inputState" name="marca" class="form-select">
            @foreach($marcas as $item)
            <option value="{{$item->codigo}}">{{$item->nombre}}</option>
            @endforeach
          </select>
          @error('marca')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>

</div>


@endsection