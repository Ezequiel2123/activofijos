{{--Heredemos la estructura del archivo app.blade.php--}}

@extends('layouts.app')

{{--Definimos el titulo--}}
@section('title', 'cliente')

{{--DEfinimos el contenido--}}
@section('content')
    
<h1>Crear</h1>
    <h5>Formulario para crear cliente</h5>
    <hr>
    <form  class="row g-3" action="/cliente/store" method="POST">
       @csrf
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">nombre</label>
          <input type="text" name="nombre" class="form-control" id="inputPassword4">
          @error('nombre')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">edad</label>
          <input type="number" name="edad" class="form-control" id="inputAddress" placeholder="">
          @error('edad')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">Categoria</label>
          <select id="inputState" name="categoria" class="form-select">
            @foreach($categorias as $item)
            <option value="{{$item->codigo}}">{{$item->nombre}}</option>
            @endforeach
          </select>
          @error('categoria')
          <span class="invalid-feedback d-block" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>      
        
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>

      <br>

@endsection