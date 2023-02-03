@extends('layouts.app')

@section('titulo')
Editar Perfil:{{auth()->user()->username}}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
    <form class="mt-10 md:mt-0" action="{{route('perfil.store')}}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                username
            </label>
            <input id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg" type="text" value="{{auth()->user()->username}}" @error('username') border-red-500 @enderror" value="{{old('username')}}">
       @error('username')
            <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
       @enderror
           
        </div>
        <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                Password
            </label>
            <input id="password" name="password" placeholder="Contraseña" class="border p-3 w-full rounded-lg" type="password"  @error('password') border-red-500 @enderror" value="{{old('password')}}">
       @error('password')
            <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
       @enderror
           
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
              New  Password
            </label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nueva Contraseña" class="border p-3 w-full rounded-lg" type="password"  @error('password_confirmation') border-red-500 @enderror" >
       @error('password_confirmation')
            <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
       @enderror
           
        </div>
        <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
              Email
            </label>
            <input id="email" name="email" placeholder="Nuevo Correo" class="border p-3 w-full rounded-lg" type="email" value="{{auth()->user()->email}}" @error('email') border-red-500 @enderror" >
       @error('email')
            <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
       @enderror
           
        </div>
        <div class="mb-5">
            <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                Imagen Pefil
            </label>
            <input id="imagen" name="imagen"  class="border p-3 w-full rounded-lg" type="file" accept="image/*">
  
           
        </div>
        <input type="submit"
        value="Guardar cambios"
        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white p-3 rounded-lg">
    </form>
    </div>
</div>
@endsection