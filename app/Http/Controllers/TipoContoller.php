<?php

namespace App\Http\Controllers;
use App\Tipo;
use App\Producto;
use Illuminate\Http\Request;

class TipoContoller extends Controller
{
    
    /**
     * Create a new controller instance.
     * esta linea de codigo la copiamos de HomeController, para obligar la autorizacion al ingresar a este controlador
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listartipos(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $listaDeTodosLosTipos = Tipo::orderBy('id')->paginate(5);

        return view('admin.tipo.index', ['listaDeTodosLosTipos' => $listaDeTodosLosTipos] );
    }

    public function verasistentecrear (Request $request){

        $request->user()->authorizeRoles('admin');
        return view('admin.tipo.nuevo');
    }

    public function creartipo(Request $request){
        $request->user()->authorizeRoles('admin');
        $listaTipos = Tipo::all();
        $datodelformulario = $request->all();      
        $nombre = $datodelformulario['nombre'];     
           
        if($listaTipos){
            foreach($listaTipos as $tipos){
                if (strcmp($tipos->name, $nombre) === 0) {
                 
                    //dd($datodelformulario['nombre']);
                    return redirect()->back()->with('alert_msg', 'La categoria ya existe');
                }
                else {
                    /*
                    $tipo = new Tipo();
                    $tipo->name = $datodelformulario['nombre'];
                    $tipo->description = $datodelformulario['detalle'];
                    $tipo->save();
                    return redirect()->back()->with('success_msg', 'La categoria fue creada');
                    */
                    //dd($datodelformulario);
                  
                }
            } 
             
        }

        $tipo = new Tipo();
        $tipo->name = $datodelformulario['nombre'];
        $tipo->description = $datodelformulario['detalle'];
        $tipo->save();
        return redirect()->back()->with('success_msg', 'La categoria fue creada');
        

    }

    public function vervistaeditar(Request $request, $id){
        $request->user()->authorizeRoles('admin');  //  dd($id);

        $tipoEditar = Tipo::where('id', $id)->first();
        //dd($tipoEditar);
        if( $tipoEditar==null)
        {
            dd($tipoEditar);  
        }
        return view('admin.tipo.editar', ['tipo' =>$tipoEditar]);

    }

    public function editartipo(Request $request){
        $request->user()->authorizeRoles('admin');
        $datosdelformulario = $request->all(); 

        $tipo = Tipo::where('id', $datosdelformulario['id'])->first();
        //dd($tipo);

        $tipo->name = $datosdelformulario['nombre'];
        $tipo->description = $datosdelformulario['detalle'];
        $tipo->save();

        return redirect(route('admintipos'));
        //dd($datosdelformulario);
    }

    public function eliminartipo(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');

        $tipo = Tipo::where('id', $id)->first();

        if( $tipo != null)
        {
            $cantidadDeProductos = Producto::where('tipo_id', $id)->count();
            
            if( $cantidadDeProductos == 0){
                
                $tipo->delete();
                return redirect()->back()->with('success_msg', 'La categoria fue borrada');
            }
            else {
                return redirect()->back()->with('alert_msg', 'La categoria no se puede borrar porque cuenta productos asignados');
                //dd($tipo);
            }
        }

        return redirect(route('admintipos'));
        
    }    
}
