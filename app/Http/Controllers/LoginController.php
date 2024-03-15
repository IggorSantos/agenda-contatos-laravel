<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
            'email.email' => 'O email não é válido'
        ]
    );

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('sucesso', 'Login realizado com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Email ou senha inválida');
        }    
     }   

     public function create(){
        return view('login.create');
     }

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('msg', 'Usuário deslogado com sucesso!');
     }
     
}
