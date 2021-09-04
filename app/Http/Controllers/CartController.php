<?php

namespace App\Http\Controllers;

use App\Producto;
use App\User;
use App\Order;
use App\orderDetails;
use PDF;
//use Illuminate\Support\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    //
     public function asignUser(){
        $userId = User::find(Auth::user()->id);
        Cart::session($userId);
     }
    public function shop()
    {
        $listaDeProductos = Producto::all();
        //dd($products);
        return view('catalogo.productos')->withTitle('SERUM LIFE STORE | SHOP')->with(['listaDeProductos' => $listaDeProductos]);
    }


    public function addProduct(Request $request)
    {        
        $producto = Producto::find($request->producto_id);
        if ($producto->cantidad >= 1) {
        Cart::add(array(
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'quantity' => 1,
            'attributes' => array(
                'image' => $producto->urlimagen,

            )
        ));      
        return redirect()->route('catalogo')->with('success_msg', "Se ha agregado con exito al carrito");
    }
    else {
        return redirect()->route('catalogo')->with('alert_msg', 'No existen cantidades suficientes');
    }
    }

    public function update(Request $request)
    {
        $item = Producto::find($request->id);
        if($request->quantity <1){
            return redirect()->route('carList')->with('alert_msg', 'La cantidad no puede ser menor a 1');
        }
        else {
        if ($item->cantidad >= $request->quantity) {
            Cart::update(
                $request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->quantity
                    ),
                )
            );
            
            return redirect()->route('carList')->with('success_msg', 'El carrito fue actualizado');
        } else {

            return redirect()->route('carList')->with('alert_msg', 'No existen cantidades suficientes');
        }
    }
    }

    public function createOrder(Request $request)
    {
        $this->middleware('auth');
        $userId = User::find(Auth::user()->id);
        //Cart::session($userId);
        $ordenMaster = new Order();
        $ordenMaster->user_id = $userId->id;
        $ordenMaster->name = $userId->name;
        $ordenMaster->secondName =$userId->secondName;
        $ordenMaster->email =$userId->email;
        $ordenMaster->address =$userId->address;
        $ordenMaster->telephone = $userId->telephone;     
        $ordenMaster->status = 'Pendiente';
        $ordenMaster->save();

        $product = Producto::all();
        $cartCollection = Cart::getContent();

        foreach ($cartCollection as $cart) {
            foreach ($product as $item) {
                if ($item->id == $cart->id) {
                    $item->cantidad = $item->cantidad - $cart->quantity;
                    $item->save();
                    $orderdetail = new orderDetails();
                    $orderdetail->order_id = $ordenMaster->id;
                    $orderdetail->producto_id = $item->id;
                    $orderdetail->producto_nombre = $item->nombre;
                    $orderdetail->cantidad = $cart->quantity;
                    $orderdetail->producto_price = $cart->price;
                    $orderdetail->subTotal = $cart->getPriceSum();
                    $orderdetail->total = Cart::getTotal();
                    $orderdetail->save();
                }
            }
        }
        Cart::clear();
        return view('cart.checkout');

        //Cart::clear();
        // return view('cart.checkout', ['cartCollection' => $cartCollection]);


        //dd($cartCollection);
    }
   

    public function cart()
    {
        $cartCollection = Cart::getContent();
            return view('cart.cart', ['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('carList')->with('success_msg', 'Producto fue eliminado!');
    }



    public function clear()
    {
        Cart::clear();
        return redirect()->route('carList')->with('success_msg', 'El carrito esta vacio');
    }

    
   
}