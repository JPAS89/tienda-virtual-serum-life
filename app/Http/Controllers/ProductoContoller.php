<?php

namespace App\Http\Controllers;
use App\Tipo;
use Illuminate\Http\Request;
use App\Producto;
use PDF;
use Illuminate\Support\Facades\Storage;
class ProductoContoller extends Controller

{
    
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
        {
            $request->user()->authorizeRoles('admin');
            $listaDeProductos = Producto::orderby('id')->paginate(5);
            //dd($listaDeProductos->first()->Marca()->first());
            return view('admin.producto.adminProducto', ['listaDeProductos' => $listaDeProductos]);
        }

       

        public function vervistacrearproducto(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $listaDeTipos = Tipo::get();
        return view('admin.producto.crear', ['listaDeTipos' => $listaDeTipos ]);
    }
  
    
    public function crearproducto(Request $request)
    {
        $request->user()->authorizeRoles('admin');
       
        $datosdelformulario = $request->all(); 
             
        $nombre = $datosdelformulario['nombre'];
        $descripcion = $datosdelformulario['descripcion'];
        $tipo_id = $datosdelformulario['tipo_id'];
        $cantidad = $datosdelformulario['cantidad'];
        $precio = $datosdelformulario['precio'];     
        $file = $request->file('urlimagen');
        $extention = $file->getClientOriginalExtension();
        $imagenNombre =time().'.'.$extention;
        //$urlimagen->move('images', $imagenNombre);
        //$url = Storage::url('file.jpg');
        $existts = Storage::disk('public')->exists($imagenNombre);

        if ($existts){
            Storage::disk('public')->exists($imagenNombre);
        }
        Storage::disk('public')->put($imagenNombre, \File::get($file));

      
        $producto = new Producto();

        $producto->tipo_id = $tipo_id;      
        $producto->nombre = $nombre;
        $producto->descripcion = $descripcion;
        $producto->cantidad = $cantidad;
        $producto->precio = $precio; 
        $producto->urlimagen =$imagenNombre;
        
       
        $producto->save();
        return redirect()->route('vervistacrearproducto')->with('success_msg', 'Producto creado!');
        //return redirect(route('adminProducto'));
        //dd($datosdelformulario);
    }

    
    public function vistaEditarProducto (Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $productoEditar = Producto::where ('id', $id)->first();
        return view ('admin.producto.editarProducto', ['producto' =>$productoEditar]);
    }

    public function editarProducto(Request $request){
        $request->user()->authorizeRoles('admin');
        $datosdelformulario = $request->all(); 
        $file = $request->file('urlimagen');
        $extention = $file->getClientOriginalExtension();
        $imagenNombre =time().'.'.$extention;
        $existts = Storage::disk('public')->exists($imagenNombre);

        if ($existts){
            Storage::disk('public')->exists($imagenNombre);
        }
        Storage::disk('public')->put($imagenNombre, \File::get($file));

        $producto = Producto::where('id', $datosdelformulario['id'])->first();
        
        $producto->nombre = $datosdelformulario['nombre'];
        $producto->descripcion = $datosdelformulario['detalle'];
        $producto->cantidad = $datosdelformulario['cantidad'];
        $producto->precio = $datosdelformulario['precio'];
        $producto->urlimagen =$imagenNombre;
       
        $producto->save();
        return redirect(route('adminProducto'));
        //dd($datosdelformulario);
    }

    public function eliminarProducto(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');

        $producto = Producto::where('id', $id)->first();

        //$cantidadDeProductos = Producto::where('id', $id)->count();
      
        $producto->delete();

        return redirect(route('adminProducto'));
        
    } 

    public function bajoStock (Request $request){
        $request->user()->authorizeRoles('admin');
        $listaDeProductos = Producto::all();
        $productos = array();
       
        foreach($listaDeProductos as $product){
            if ($product->cantidad <= 5) {
                $productos[] = $product;
               
            }
        }  
        //dd($productos);
        return view('admin.producto.lowStock', ['listaDeProductos' =>$productos]);
    }

    public function bajoStockPdf(){

        $listaDeProductos = Producto::all();
        $productos = array();
        foreach($listaDeProductos as $product){
            if ($product->cantidad <= 5) {
                $productos[] = $product;
               
            }
        } 
        view()->share('listaDeProductos', $productos);
        $pdf = PDF::loadView('admin.producto.listaProductos', $productos);
        return $pdf->stream('Productosbajominimo.pdf');
    }

    public function vistaEditarCantidadProducto (Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $productoEditar = Producto::where ('id', $id)->first();
        return view ('admin.producto.editarCantidad', ['producto' =>$productoEditar]);
    }

    public function editarExisteciaProducto(Request $request){
        $request->user()->authorizeRoles('admin');
        $datosdelformulario = $request->all();    

        $producto = Producto::where('id', $datosdelformulario['id'])->first();
        
       
        $producto->cantidad = $datosdelformulario['cantidad'];
       
        $producto->save();
        return redirect(route('adminProducto'));
        //dd($datosdelformulario);
    }
}