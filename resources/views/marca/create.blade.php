{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Crear Marca')

{{-- Definimos el contenido --}}
@section('content')
    <h1>Crear Marca</h1>
    <h5>Formulario para crear marca</h5>
    <hr>
    <div class="container">
        <form class="row g-3" action="/marca/store" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="inputNombre">
                @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
