@extends('layouts.admin')

@section('content')
<div class="w-1/2 flex flex-col mt-4">
	<div class="w-full overflow-x-hidden border-t flex">
		<main class="w-full flex-grow p-4 bg-white rounded-lg shadow-md">
				<div class="w-full">
					<h1 class="text-2xl font-bold mb-5 text-center">Generar Reporte Financiero</h1>
					{{-- <form method="POST" action="{{ route('reportes.financieros.store') }}"> --}}
					<form method="POST">
						@csrf
						<div class="mb-4">
							<label for="idEmpleado" class="block text-sm font-medium text-gray-700">Empleado</label>
							<select id="idEmpleado" name="idEmpleado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
								<!-- Asegúrate de que los empleados estén disponibles en el controlador y se pasen a la vista -->
								{{-- @foreach($empleados as $empleado)
            <option value="{{ $empleado->idEmpleado }}">{{ $empleado->nombre }}</option>
								@endforeach --}}
							</select>
						</div>
						<div class="mb-4">
							<label for="mes" class="block text-sm font-medium text-gray-700">Mes</label>
							<input type="month" id="mes" name="mes" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						</div>
						<div class="flex justify-center">
							<button type="submit" class="w-1/2 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Generar Reporte <i class="ml-3 fa-solid fa-download"></i></button>
						</div>
					</form>
				</div>
		</main>
	</div>
</div>
@endsection