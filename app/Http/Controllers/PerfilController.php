<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //para proteger la vista

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
      return view('perfil.index');
    }
    public function store(Request $request){
        $request->request->add(['username'=>Str::slug($request->username)]);

$this->validate($request,[
    'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:editar-perfil, twitter',
    'email'=>['email','unique:users,email'.auth()->user()->id,
    'password'=>]
    
]);

if($request->imagen){
    $imagen=$request->file('imagen');
    $nombreImagen=Str::uuid().".".$imagen->extension();
    $imagenServidor=Image::make($imagen); 
    $imagenServidor->fit(1000,1000);
    $imagenPath=public_path('perfiles') . '/' . $nombreImagen;
    $imagenServidor->save($imagenPath);
}
////////*guardar cambios.

//usuario actual que esta modificando su informacion.
$usuario=User::find(auth()->user()->id);
//el username del usuario es igual al nuevo 
$usuario->username=$request->username;
$usuario->imagen=$nombreImagen ?? auth()->user()->imagen ?? null;

$usuario->save();
//Redireccionar 
return redirect()->route('posts.index',$usuario->username);
    }
}
