<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;  

class loginController extends Controller
{
    
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' =>['required', 'email'],
            'password'=>['required'],
        ],
        [
            'email.required'=>'O campo de Email é obrigatorio!',
            'email.email'=>'O email não é válido',
            'password.required'=>'O campo senha é obrigatorio!',
        ]   
        );

        if(Auth::attempt($credenciais, $request->has('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Email ou Senha  inválidos. ');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login.form'));
    }
    public function create(){
        return view('login.create');
    }

}
