<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Mi Aplicación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts.navigation')
    <div class="relative w-full h-[75vh] bg-cover bg-center" style="background-image: url('{{ asset('images/img-servicios.jpg') }}');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center space-y-4">
                <h1 class="text-4xl md:text-6xl font-serif text-white">
                    Servicios
                </h1>
                <h2 class="text-xl md:text-3xl font-serif text-white">
                    Tu satisfacción es nuestra experiencia
                </h2>
                <a href="{{ route('home') }}" class="text-sm md:text-base px-4 py-2 bg-gray-400 text-gray-800 rounded-md hover:bg-gray-500 mt-5 inline-block">
                    Volver a Inicio
                </a>
            </div>
        </div>
    </div>


    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $groupedServicios = $servicios->groupBy('tipo_servicio');
                $specialServices = $groupedServicios->pull('servicios_especiales');
                $eyebrowsServices = $groupedServicios->pull('cejas_pestanas_depilaciones');
                $nailsServices = $groupedServicios->pull('unas');
            @endphp

            @foreach($groupedServicios as $tipoServicio => $serviciosGrupo)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ ucfirst($tipoServicio) }}</h2>
                    <div class="space-y-4">
                        <ul class="list-none p-0">
                            @foreach($serviciosGrupo as $servicio)
                                <li class="text-gray-700 py-2 px-3 bg-gray-50 rounded-md shadow-sm">{{ $servicio->servicio_detalle }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            <!-- Servicios Especiales y Cejas juntos pero separados -->
            @if($specialServices->isNotEmpty() || $eyebrowsServices->isNotEmpty())
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    @if($eyebrowsServices->isNotEmpty())
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Cejas y Pestañas</h2>
                            <div class="space-y-4">
                                <ul class="list-none p-0">
                                    @foreach($eyebrowsServices as $servicio)
                                        <li class="text-gray-700 py-2 px-3 bg-gray-50 rounded-md shadow-sm">{{ $servicio->servicio_detalle }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if($specialServices->isNotEmpty())
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Servicios Especiales</h2>
                            <div class="space-y-4">
                                <ul class="list-none p-0">
                                    @foreach($specialServices as $servicio)
                                        <li class="text-gray-700 py-2 px-3 bg-gray-50 rounded-md shadow-sm">{{ $servicio->servicio_detalle }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Manicure (antes 'Una') -->
            @if($nailsServices->isNotEmpty())
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Manicure</h2>
                    <div class="space-y-4">
                        <ul class="list-none p-0">
                            @foreach($nailsServices as $servicio)
                                <li class="text-gray-700 py-2 px-3 bg-gray-50 rounded-md shadow-sm">{{ $servicio->servicio_detalle }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.users.footer')

</body>
</html>
