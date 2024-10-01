<?php

namespace App\Http\Controllers;
use App\Models\BranchCliente;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //listar tods los productos
        $cliente = Cliente::select(
            "clientes.codigo",
            "clientes.nombre",
            "clientes.edad",
            "categorias.nombre as categoria"
        )->join("categorias","categorias.codigo", "=", "clientes.categoria")->get();
        //dd($productos);

        //mostrar vistas show.blade.php junto al listado de productos
        return view('/cliente/show')->with(['cliente'=>$cliente]);

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
           $cliente = BranchCliente::all();
           //mostrar vista create.blade.php junto al listado de marcas
           return view('/cliente/create')->with(['categorias'=>$cliente]);
   
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
         //
        //dd($request->post());
        //validar campos
    
        $data = request()->validate([
            'nombre'=> 'required',
            'edad'=> 'required',
            'categoria'=> 'required'
        ]);
        //enviar insert
        Cliente::create($data);

        //redireccionar
        return redirect('/cliente/show');
    }

    /**
     * Display the specified resource.
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
    public function edit(Cliente $cliente)
    {
         //lsitar marca para llenar select
         $categorias = BranchCliente::all();
         return view('cliente/update')->with(['cliente'=>$cliente,'categorias'=>$categorias]);
   
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        // Recuperar el cliente por su ID
     

    // Si no se encuentra el cliente, devolver un error o redirigir
    if (!$cliente) {
        return redirect('cliente/show')->withErrors('Cliente no encontrado');
    }
        //validar campos
        $data = request()->validate([
            'nombre'=> 'required',
            'edad'=> 'required',
            'categoria'=> 'required'
        ]);


        //reemplazamos datos anteriores
        $cliente->nombre =$data['nombre'];
        $cliente->edad =$data['edad'];
        $cliente->categoria =$data['categoria'];
        $cliente->updated_at = now();

        //enviar a guardar la actualizacion
        $cliente->save();
        //redireccionar
        return redirect('/cliente/show');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
         //Eliminar el product con el id recibido
         Cliente::destroy($id);
         //Retornar una respuesta json
         return response()->json(array('res'=>true));
  
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
