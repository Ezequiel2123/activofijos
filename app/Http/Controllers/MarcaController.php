<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    // Mostrar el listado de marcas
    public function index()
    {
        $marcas = Marca::all(); // Obtener todas las marcas
        return view('marca.show', compact('marcas')); // Pasar las marcas a la vista
    }

    // Mostrar el formulario para crear una nueva marca
    public function create()
    {
        return view('marca.create'); // Retornar la vista de crear
    }

    // Almacenar una nueva marca
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        Marca::create($request->all()); // Crear la nueva marca
        return redirect('/marca/show')->with('success', 'Marca creada con éxito.');
    }

    // Mostrar el formulario para editar una marca
    public function edit($codigo)
    {
        $marca = Marca::findOrFail($codigo); // Buscar la marca por código
        return view('marca.update', compact('marca')); // Pasar la marca a la vista
    }

    // Actualizar una marca
    public function update(Request $request, $codigo)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $marca = Marca::findOrFail($codigo); // Buscar la marca por código
        $marca->update($request->all()); // Actualizar la marca
        return redirect('/marca/show')->with('success', 'Marca actualizada con éxito.');
    }

    // Eliminar una marca
    public function destroy($codigo)
    {
        try {
            $marca = Marca::findOrFail($codigo); // Buscar la marca por código
            $marca->delete(); // Intentar eliminar la marca
            return redirect('/marca/show')->with('success', 'Marca eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect('/marca/show')->with('error', 'No se pudo eliminar la marca. Asegúrate de que no haya registros asociados.');
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}