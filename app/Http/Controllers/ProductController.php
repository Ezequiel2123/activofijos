<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        //listar tods los productos
        $productos = Product::select(
            "productos.codigo",
            "productos.nombre",
            "productos.precio",
            "marcas.nombre as marca"
        )->join("marcas","marcas.codigo", "=", "productos.marca")->get();
        //dd($productos);

        //mostrar vistas show.blade.php junto al listado de productos
        return view('/products/show')->with(['productos'=>$productos]);

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
        //listsar marcas para llenar select 
        $marcas = Branch::all();
        //mostrar vista create.blade.php junto al listado de marcas
        return view('/products/create')->with(['marcas'=>$marcas]);

        /**
         * @param \Illuminate\Http\Request 
         * @return \Illiminate\Http\Response
         * 
         */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->post());
        //validar campos
    
        $data = request()->validate([
            'nombre'=> 'required',
            'precio'=> 'required',
            'marca'=> 'required'
        ]);
        //enviar insert
        Product::create($data);

        //redireccionar
        return redirect('/products/show');

    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //lsitar marca para llenar select
        $marcas = Branch::all();
      return view('/products/update')->with(['producto'=>$product,'marcas'=>$marcas]);

    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, Product $product)
    {
        //validar campos
        $data = request()->validate([
            'nombre'=> 'required',
            'precio'=> 'required',
            'marca'=> 'required'
        ]);


        //reemplazamos datos anteriores
        $product->nombre =$data['nombre'];
        $product->precio =$data['precio'];
        $product->marca =$data['marca'];
        $product->updated_at = now();

        //enviar a guardar la actualizacion
        $product->save();
        //redireccionar
        return redirect('/products/show');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar el product con el id recibido
        Product::destroy($id);
        //Retornar una respuesta json
        return response()->json(array('res'=>true));

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
