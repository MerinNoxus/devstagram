@extends ('layouts.app')
@section ('titulo')
Registrate en DevStagram
@endsection
@section ('contenido')
<div class="md:flex md:justify-center md:gap-10 p-5 md:items-center" >
    <div class="md:w-6/12">
       <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro Usuarios">
    </div>
    <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('register')}}" method="POST" novalidate>
           @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input id="name" name="name" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg" type="text">
           @error('name')
                <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
           @enderror
               
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                <input id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg @error('username')
                border-red-500 @enderror" value="{{old('username')}}" type="text">
                @error('username')
                <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
           @enderror
            </div>
            <div class="mb-5">
                <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input id="email" name="email" placeholder="Tu Correo Electrónico" class="border p-3 w-full rounded-lg @error('email')
                border-red-500 @enderror" value="{{old('email')}}" type="email ">

                @error('email')
                <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
           @enderror
           
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">password</label>
                <input id="password" name="password" placeholder="Contraseña" class="border p-3 w-full rounded-lg @error('password')
                border-red-500 @enderror" value="{{old('password')}}" type="password">
                @error('password')
                <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
           @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir password</label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Ingresar de nuevo Contraseña" class="border p-3 w-full rounded-lg" type="password">
                @error('password')
                <p class="text-white my-2 rounded-lg text-sm bg-red-500 p-2 text-center">{{$message}}</p>
           @enderror
            </div>
            <input type="submit"
            value="Crear Cuenta"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white p-3 rounded-lg">
        </form>
    </div>
</div>
@endsection
