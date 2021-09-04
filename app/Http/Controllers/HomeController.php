<?php

namespace App\Http\Controllers;
use App\Tipo;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //verifica que tenga algun rol para accesar
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }

    public function indexadmin(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        return view('admin.index');
    }

}
