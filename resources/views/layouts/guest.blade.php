<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'LImage Beauty Salon') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
	<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

		<div class="flex flex-row sm:max-w-4xl h-1/2 mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
			<!-- Image Section -->
			<div class="hidden sm:flex sm:w-1/2 justify-center items-center">
				<img src=" {{Vite::asset('resources/images/login.png')}}" alt="Imagen de la Empresa" class="max-w-full h-auto">
			</div>
			<!-- Form Section -->
			<div class="w-full sm:w-1/2 px-6 py-4 m-auto">
				{{ $slot }}
			</div>
		</div>
	</div>
</body>
</html>