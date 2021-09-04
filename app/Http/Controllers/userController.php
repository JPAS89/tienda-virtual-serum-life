<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //  
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vistaEditarUsuario()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('auth.userEdit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function actualizarUsuario(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (auth::user()->email == $request['email']) {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'secondName' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:500'],
                    'telephone' => ['required', 'string', 'max:10'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                ]);
            } else {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'secondName' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:500'],
                    'telephone' => ['required', 'string', 'max:10'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                ]);
            }


            $user->name = $request['name'];
            $user->secondName = $request['secondName'];
            $user->address = $request['address'];
            $user->telephone = $request['telephone'];
            $user->email = $request['email'];
            $user->save();
            
        }
        return redirect()->route('vistaEditarUsuario')->with('success_msg', 'Datos de Usuario Actualizados!');
       
    }


    public function userList(Request $request)
        {
            $request->user()->authorizeRoles('admin');
            $listaDeUsuarios = User::orderby('id')->paginate(4);
            return view('admin.users.indexUser', ['listaDeUsuarios' => $listaDeUsuarios]);
        }

        public function vistaDetalleUsuario(Request $request, $id)
        {
            $request->user()->authorizeRoles('admin');
            $detalleUsuario = user::where('id', $id)->first();
            return view('admin.users.userinfo', ['usuario' => $detalleUsuario]);
        }
   
}
