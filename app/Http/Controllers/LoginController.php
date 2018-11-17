<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function __invoke(){
        return view('inicio.login');
    }

    public function authenticate(Request $request){
        return $this->auth('administrador', ["pk_usuario" => $request->username, "password" => $request->password, 'role' => $request->role], '/home');
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect(route("login"));
    }

    /* Este metodo verifica el login, ademas de esto, crea una variable de session con los datos 
       del usuario autenticado */
    private function auth($credenciales, $ruta){
        $auth = Auth::attempt($credenciales);
        if($auth){
            session(['datos'=> Auth::user()->session()]);
            return redirect($ruta);
        }else{
            return redirect()->route('login')->withInput()->with('false', 'Las credenciales no son correctas');
        }
    }
}
