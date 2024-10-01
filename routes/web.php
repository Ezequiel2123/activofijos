<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;


 route::get('/product', [ProductController::class, 'inicio']);

Route::get('/', function () {
    return view('home');
});

Route::get('/Departamentos/show', function (){
    return view('Departamentos/show');
});

Route::get('/Activos/show', function (){
    return view('Activos/show');
});

Route::get('/Proveedores/show', function (){
        return view('Proveedores/show');
});

Route::get('/Ubicaciones/show', function (){
    return view('Ubicaciones/show');
});

Route::get('/Mantenimientos/show', function (){
    return view('Mantenimientos/show');
});

Route::get('/Empleados/show', function (){
    return view('Empleados/show');
});

Route::get('/Depreciacion/show', function (){
    return view('Depreciacion/show');
});

Route::get('/Disposicion/show', function (){
    return view('Disposicion/show');
});

Route::get('/Proveedores/show', function (){
    return view('Proveedores/show');
});

Route::get('/Proveedores/show', function (){
    return view('Proveedores/show');
});

Route::get('/Proveedores/show', function (){
    return view('Proveedores/show');
});

Route::get('/products/create',  [ProductController::class, 'create']);

Route::get('/products/edit/{product}', [ProductController::class, 'edit']);


//Ruta para mostrar la vista de show.blade.php
Route::get('/products/show', [ProductController::class, 'index']);

Route::get('/products/create',  [ProductController::class, 'create']);


//Ruta para mostrar la vista de show.blade.php
Route::get('/products/edit/{product}', [ProductController::class, 'edit']);

//Ruta para mostrar la vista de show.blade.php
Route::post('/products/store', [ProductController::class, 'store']);

Route::put('/products/update/{product}', [ProductController::class, 'update']);
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy']);


//categoria

Route::get('/categoria/show', [CategoriaController::class, 'index']);

Route::get('/categoria/create',  [CategoriaController::class, 'create']);


//Ruta para mostrar la vista de show.blade.php
Route::get('/categoria/edit/{categoria}', [CategoriaController::class, 'edit']);

//Ruta para mostrar la vista de show.blade.php
Route::post('/categoria/store', [CategoriaController::class, 'store']);

Route::put('/categoria/update/{categoria}', [CategoriaController::class, 'update']);
Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy']);

// Route::get('/categoria/show', function () {
//     return view('categoria/show');
// });

// Route::get('/categoria/create', function () {
//     return view('categoria/create');
// });

// Route::get('/categoria/update', function () {
//     return view('categoria/update');
// });

//cliente

//Route::get('/cliente/show', function () {
//  return view('cliente/show');
//});

//Route::get('/cliente/create', function () {
//    return view('cliente/create');
//});

//Route::get('/cliente/update', function () {
//    return view('cliente/update');
//});

Route::get('/cliente/show', [ClienteController::class, 'index']);

Route::get('/cliente/create',  [ClienteController::class, 'create']);


//Ruta para mostrar la vista de show.blade.php
Route::get('/cliente/edit/{cliente}', [ClienteController::class, 'edit']);

//Ruta para mostrar la vista de show.blade.php
Route::post('/cliente/store', [ClienteController::class, 'store']);

route::put('/cliente/update/{cliente}', [ClienteController::class, 'update']);
route::delete('/cliente/destroy/{id}', [ClienteController::class, 'destroy']);
//nombre

// Rutas para Marcas
Route::get('/marca/show', [MarcaController::class, 'index']);
Route::get('/marca/create', [MarcaController::class, 'create']);
Route::post('/marca/store', [MarcaController::class, 'store']);
Route::get('/marca/edit/{codigo}', [MarcaController::class, 'edit']);
Route::put('/marca/update/{codigo}', [MarcaController::class, 'update']);
Route::delete('/marca/destroy/{codigo}', [MarcaController::class, 'destroy']);




Route::get('/home', function () {
    return view('home');
})->middleware('auth');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
