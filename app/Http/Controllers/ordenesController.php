<?php

namespace App\Http\Controllers;
use App\Producto;
use App\User;
use App\Order;
use App\orderDetails;
use PDF;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ordenesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
     //muestra la lista  de compras para el admin
    public function listarOrdenes (Request $request){

        $request->user()->authorizeRoles('admin');
        $listaDeOrdenes = Order::orderby('id')->paginate(4);
        //dd($listaDeProductos->first()->Marca()->first());
        return view('admin.ordenes.index', ['listaDeOrdenes' => $listaDeOrdenes]);
    }
    //muestra detalle de compras 
    public function verDetallePedido(Request $request, $id){

        $ordenMaestra = Order::where ('id', $id)->first();
        $detallePedido = orderDetails::all();
        $listadetalle = array();
        
        foreach($detallePedido as $obj){
            if ($obj->order_id == $ordenMaestra->id) {
                $listadetalle[] = $obj;
               
            }
        } 
        //dd($ordenMaestra);
        return view ('admin.ordenes.detallePedido', ['encabezado' =>$ordenMaestra],['detalle' =>$listadetalle]);
    }
     //muestra lista de compras para el usuario
    public function listaPedidos(){


       
            $user = User::find(Auth::user()->id);
            $ordenMaestra = Order::where ('user_id', $user->id)->paginate(3);
            $lista = array();
            $lista = $ordenMaestra;

            if (count($ordenMaestra) == 0) {
            
            return view('auth.ordenes.emptyOrder');
             //dd($ordenMaestra);
        }
        else {
            //dd($ordenMaestra);
            return view('auth.ordenes.index', ['listaDeOrdenes' => $ordenMaestra]);
        }
    }

    public function ordenDetails(Request $request, $id)
    {
        $ordenMaestra = Order::where ('id', $id)->first();
        $detallePedido = orderDetails::all();
        $listadetalle = array();
        
        foreach($detallePedido as $obj){
            if ($obj->order_id == $ordenMaestra->id) {
                $listadetalle[] = $obj;
               
            }
        } 
        
        view()->share(['encabezado' =>$ordenMaestra,'detalle' =>$listadetalle]);

        $pdf = PDF::loadView('auth.ordenes.orderDetails', $ordenMaestra, $listadetalle);
      
        return $pdf->stream('DetallePedido.pdf');
    }
        //confirmar entrega y cambia el estado de la orden 
    public function confirmarEntrega(Request $request, $id)
    {
        $ordenMaestra = Order::where ('id', $id)->first();
        if ($ordenMaestra->status == 'Pendiente'){
            $ordenMaestra->status = 'Entregado';
            $ordenMaestra->save();
            return redirect()->back()->with('success_msg', 'La orden fue entegada con exito');
        } else{
            return redirect()->back()->with('alert_msg', 'Verifique que el pedido este pendiente de entregar o no haya sido anulado ');
        }
    }
    public function anularOrden(Request $request, $id)
    {
        # code...
        $ordenMaestra = Order::where ('id', $id)->first();
        $detallePedido = orderDetails::all();
        $producto = Producto::all();
        $listadetalle = array();
        if ($ordenMaestra->status == 'Pendiente'){
        foreach($detallePedido as $obj){
            if ($obj->order_id == $ordenMaestra->id) {
                $listadetalle[] = $obj;
               
            }
        } 
        foreach (  $listadetalle as $detalle) {
            foreach ($producto as $item) {
                if ($item->id == $detalle->producto_id) {
                    $item->cantidad = $item->cantidad + $detalle->cantidad;
                    $item->save();
                  
                }
            }
        }
        $ordenMaestra->status = 'Anulada';
        $ordenMaestra->save();
        return redirect()->back()->with('success_msg', 'La orden fue anulada con exito');
    }
    else{
        return redirect()->back()->with('alert_msg', 'Verifique que el pedido este pendiente de entregar o no haya sido anulado ');
    }
    }
}


