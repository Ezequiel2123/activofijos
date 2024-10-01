<?php

namespace App\Http\Controllers;
use App\Models\BranchCategoria;
use App\Models\categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las categorías
        $categorias = categoria::select(
            "codigo",
            "nombre"
        )->get();

        // Mostrar vista show.blade.php junto al listado de categorías
        return view('categoria.show')->with(['categorias' => $categorias]);


        /**
         * show the form for creating a new resouce
         * @return \Illluminate\Http\Response
         */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    //    $marcas = Branch::all();
        //mostrar vista create.blade.php junto al listado de marcas
        return view('/categoria/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre'=> 'required',
     
        ]);
        //enviar insert
        categoria::create($data);

        //redireccionar
        return redirect('/categoria/show');
    }

    /**
     * Display the specified resource.
     *  @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        //
        return view('/categoria/update')->with(['categorias'=>$categoria,'categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *  * Update the specified resource in storage.
     * @param \Illuminate\Http\Request
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     
     */
    public function update(Request $request, categoria $categoria)
    {
        //validar campos
        $data = request()->validate([
            'nombre'=> 'required',
          
        ]);


        //reemplazamos datos anteriores
        $categoria->nombre =$data['nombre'];
        $categoria->updated_at = now();

        //enviar a guardar la actualizacion
        $categoria->save();
        //redireccionar
        return redirect('/categoria/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         //Eliminar el product con el id recibido
         Categoria::destroy($id);
         //Retornar una respuesta json
         return response()->json(array('res'=>true));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
