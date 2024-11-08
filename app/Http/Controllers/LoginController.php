<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ],[
            'email.required'=>'Esse campo de email é obrigatório',
            'password.required'=>'Esse campo de senha é obrigatório',
            // 'password.min'=>'Essa senha tem que ter no mínimo 8 caracteres'
        ]);
        $credentials=$request->only('email', 'password');

        $authenticated=FacadesAuth::attempt($credentials);
        

        if(!$authenticated){
            return redirect()->route('login.index')->withErrors(['Error'=>'Email ou senha invalida']);
        }
        return redirect()->route('login.index')->with('success', '');
    }
    public function destroy()
    {
        FacadesAuth::logout();
        return redirect()->route('login.index');
    }
}
