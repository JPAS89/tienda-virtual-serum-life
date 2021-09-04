<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class catalogoController extends Controller
{
    //
    public function showCatalogo()
    {
        $this->middleware('guest');
        $listaDeProductos = Producto::orderby('id')->paginate(6);

        return view('catalogo.productos')->withTitle('SERUM LIFE STORE | SHOP')->with(['listaDeProductos' => $listaDeProductos]);
    }
    public function vistaDetalleProducto(Request $request, $id)
    {

        $listaDeProductos = Producto::where('id', $id)->first();
        return view('catalogo.detalleProducto', ['producto' => $listaDeProductos]);
    }

    public function buscarProducto(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        //en la variable buscar voy almacenar lo que estoy recibiendo en el parametro buscar atravez de ajax
        $buscar = $request->buscar;
        //en la variable criterio voy almacenar lo que estoy recibiendo en el parametro criterio mediante el metod get atravez de ajax
        $criterio = $request->criterio;

        if ($buscar == '') { //trabaja por el metodo join donde uniremos con la tabla categorias
            //muestra los registros de mi tabla categoria, ordenandolos de forma descendente por el id
            //en este caso la llave foranea de mi tabla articulos debe ser igual a la llave primaria id de mi tabla categorias
            $productos = Producto::join('tipos', 'productos.tipo_id', '=', 'tipos.id')
                //empezara a seleccionar todas las columnas que quiero obtener
                //de mi tabla categorias la voy a renombrar por nombre_categoria
                ->select(
                    'productos.id',
                    'productos.tipo_id',
                    'productos.nombre',
                    'tipos.name as name_tipo',
                    'productos.cantidad',
                    'productos.precio',
                    'productos.descripcion'
                )
                ->orderBy('productos.id', 'asc')->paginate(5);
        } else {
            $productos = Producto::join('tipos', 'productos.tipo_id', '=', 'tipo.id')
                //empezara a seleccionar todas las columnas que quiero obtener
                //de mi tabla categorias la voy a renombrar por nombre_categoria
                ->select(
                    'productos.id',
                    'productos.tipo_id',
                    'productos.nombre',
                    'tipos.name as name_tipo',
                    'productos.cantidad',
                    'productos.precio',
                    'productos.descripcion'
                )
                //lo que vamos a decir es si criterio es nombre el campo con los que vamos a bucar es criterio. nombre y si el criterio es descripcion voy a buscar por el campo articulos. descripcion
                ->where('productos.' . $criterio, 'like', '%' . $buscar . '%')
                ->orderBy('productos.id', 'asc')->paginate(5);
        }

        return (['productos' => $productos]);
    }

    public function listarProducto(Request $request) //espera
    {
        if (!$request->ajax()) return redirect('/');
        //recibe dos paramentros, buscar y criterio
        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar == '') { //si el parametro buscar esta vacio voy a obtener el listado de las productos
            $productos = Producto::join('tipos', 'productos.tipo_id', '=', 'tipos.id')
            ->select(
                'productos.id',
                'productos.tipo_id',
                'productos.nombre',
                'tipos.name as name_tipo',
                'productos.cantidad',
                'productos.precio',
                'productos.descripcion'
            )
                ->orderBy('productos.id', 'desc')->paginate(10);
        } else { //sino realiza el filtro, usando el metodo where por ese criterio de busqueda
            $productos = Producto::join('tipos', 'productos.tipo_id', '=', 'tipos.id')
            ->select(
                'productos.id',
                'productos.tipo_id',
                'productos.nombre',
                'tipos.name as name_tipo',
                'productos.cantidad',
                'productos.precio',
                'productos.descripcion'
            )
                ->where('productos.' . $criterio, 'like', '%' . $buscar . '%')
                ->orderBy('productos.id', 'desc')->paginate(10); //muestro los 10 primeros resultados para no mostar todo
        }

        return ['productos' => $productos]; //retorna el objeto productos y le envio ese objeto productos lo que tengo en mi objeto materias, es decir la lista de todas la materias
    }
}
