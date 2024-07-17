<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body">
        <!--navbar-->
       @include('layouts.navigation')

<!-- Section principal de bienvenida -->
<main class="flex flex-col md:flex-row items-center justify-around w-full py-10 px-4 md:px-20">
    <div class="order-2 md:order-1 w-full md:w-1/2 mt-4 md:mt-0">
        <img src="{{ asset('images/img-bienvenida.png') }}" alt="imagen de Bienvenida" class="w-full md:w-full">
    </div>
    <div class="order-1 md:order-2 w-full md:w-1/2 text-center space-y-4">
        <h1 class="text-4xl md:text-6xl font-serif text-gray-800">
            Bienvenidos a <br> L´ Image Beauty
        </h1>
        <h2 class="text-xl md:text-3xl font-serif text-gray-800">
            Salon & supply
        </h2>
        <button class="text-sm md:text-base px-4 py-2 bg-gray-400 text-gray-800 rounded-md hover:bg-gray-500">
            Ver nuestros Servicios
        </button>
    </div>
</main>


    <!--section sobre Nosotros-->
    @include('layouts.users.sobreNosotros')

    <!--section Ubicacion-->
    @include('layouts.users.ubicacion')

     <!--footer-->
     @include('layouts.users.footer')
    </body>
</html>
