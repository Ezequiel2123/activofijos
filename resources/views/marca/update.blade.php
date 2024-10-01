{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Actualizar Marca')

{{-- Definimos el contenido --}}
@section('content')
    <h1>Actualizar Marca</h1>
    <h5>Formulario para actualizar</h5>
    <hr>
    <form class="row g-3" action="/marca/update/{{ $marca->codigo }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ $marca->nombre }}" class="form-control" id="inputNombre">
            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Actualizar</button>
    </form>
@endsection
