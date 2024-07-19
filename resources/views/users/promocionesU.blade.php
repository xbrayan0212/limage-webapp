<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones - Mi Aplicación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Contenido Principal -->
    <div class="relative w-full h-[75vh] bg-cover bg-center" style="background-image: url('{{ asset('images/img-promociones.jpg') }}');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center space-y-4">
                <h1 class="text-5xl md:text-7xl font-serif text-white">
                    Promociones
                </h1>
                <h2 class="text-2xl md:text-4xl font-serif text-white">
                    Conoces las mejores Promociones para ti
                </h2>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-12 max-w-7xl">
        <h1 class="text-4xl font-bold mb-12 text-center">Promociones</h1>

        <div class="flex flex-col items-center gap-12 md:grid md:grid-cols-2 lg:grid-cols-2 lg:gap-12">
            @forelse($promociones as $promocion)
                <div class="bg-white p-12 rounded-lg shadow-lg h-[700px] w-full max-w-4xl flex flex-col justify-between">
                    <h2 class="text-3xl font-semibold mb-6">{{ $promocion->titulo }}</h2>
                    <p class="text-gray-700 mb-8 flex-1">{{ $promocion->descripcion }}</p>
                    @if($promocion->imagen)
                        <img src="{{ asset('storage/' . $promocion->imagen) }}" alt="{{ $promocion->titulo }}" class="w-full h-80 object-cover object-center mb-6 rounded-lg">
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-500">No hay promociones disponibles.</p>
            @endforelse
        </div>
    </div>



    <!-- Footer -->
    @include('layouts.users.footer')

</body>
</html>
