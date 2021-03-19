<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['only'=>'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function login()
    {
        $datos = [
            'email' => 'required|email|string',
            'password' => 'required|string'
        ];

        $mensaje =[
            'email.email' =>'Ingrese un email valido',
            'email.required' =>'Ingrese su email',
            'email.string' =>'Ingrese un email valido',
            'password.required' =>'Ingrese su contraseña',        
        ];
        
        $credentials =$this->validate(request(),$datos,$mensaje);

        if (Auth::attempt($credentials)) {
            return response()->json($credentials);
        }
        //return back()->withErrors(['email'=>'Estas credenciales no coinciden con nuestros registros']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showlogin');
    }
}
