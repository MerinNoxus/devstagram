<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
  public function store(Request $request){
    //dd($request);
    //dd($request->get('username'));
    //modificar el Request
   
    $this->validate($request,[
    'name'=>'required|max:30',
    'username'=>'required|unique:users|min:3|max:20',
    'email'=>'required|unique:users|email|max:60',
    'password'=> 'required|confirmed|min:6']);
  //dd('creando usuario');
  User::create([
    'name'=>$request->name,
    'username'=>Str::slug($request->username),
    'email'=>$request->email,
    'password'=>Hash::make($request->password)
  ]);
  //AUTENTICCAR USUARIO
/*   auth()->attempt([
    'email'=>$request->email,
    'password'=>$request->password
  ]); */
  //OTRA FORMA DE AUTENTICAR
auth()->attempt($request->only('email','password'));
//REDIRECCIONAR
return redirect()->route('posts.index',auth()->user()->username);
  }
}
