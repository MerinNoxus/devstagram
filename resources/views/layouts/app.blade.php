<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <title>Desvtagram- @yield('titulo')</title>
   {{--  <script src="{{asset('js/app.js')}}" defer></script> --}}
   @vite(['resources/css/app.css'])


</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">Devstagram</h1>
            @auth
            <nav class="flex gap-2 items-center">
                <a class="font-bold  text-gray-600" href="#">Hola: <span class="font-normal">{{auth()->user()->username}}</span></a>
                <a class="font-bold uppercase text-gray-600" href="#">Cerrar Sesión</a>
            </nav>
            @endauth
            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600" href="{{route('login')}}">Login</a>
                    <a class="font-bold uppercase text-gray-600" href="{{route('register')}}">Crear Cuenta</a>
                </nav>
            @endguest
            
        </div>

    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')

    </main>
    <footer class="text-center p-5 text-gray-500 font-bold uppercase">
        Devstagram-Todos los derechos reservados
        <!--  @php echo date ('Y') @endphp -->
        {{now()->year}}
    </footer>
</body>
