@extends('layouts.admin')

@section('content')
<div class="w-8/12 flex flex-col mt-4">
	<div class="w-full overflow-x-hidden flex">
		<main class="w-full flex-grow p-4 bg-white rounded-lg drop-shadow-md">
			<div class="w-full">
				<h1 class="pb-3 text-3xl text-center font-bold">Reporte Financiero</h1>

				<!-- Línea divisora -->
				<hr class="w-full border-t border-gray-300 my-4"
					style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">

				<form method="POST" action="{{ route('admin.consultarReporte') }}" class="flex flex-col items-center">
					@csrf
					<div class="mb-4 w-1/2">
						<label for="idEmpleado" class="block text-sm font-medium text-gray-700">Trabajadora</label>
						<select id="idEmpleado" name="idEmpleado"
							class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
							<option value="">Todas</option>
							@foreach ($empleados as $empleado)
							<option value="{{ $empleado->idEmpleado }}" {{ old('idEmpleado', request('idEmpleado'))==$empleado->
								idEmpleado ? 'selected' : '' }}>
								{{ $empleado->nombre }} {{ $empleado->apellido }} ({{ $empleado->especialidad }})
							</option>
							@endforeach
						</select>
					</div>
					<div class="flex w-1/2 justify-between">
						<div class="mb-4 w-5/12">
							<label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
							<input type="date" id="fecha_inicio" name="fecha_inicio"
								value="{{ old('fecha_inicio', request('fecha_inicio')) }}"
								class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
							@error('fecha_inicio')
							<div class="text-red-500 text-sm mt-1">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-4 w-5/12">
							<label for="fecha_final" class="block text-sm font-medium text-gray-700">Fecha Final</label>
							<input type="date" id="fecha_final" name="fecha_final"
								value="{{ old('fecha_final', request('fecha_final')) }}"
								class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
							@error('fecha_final')
							<div class="text-red-500 text-sm mt-1">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="flex justify-center w-full mt-4">
						<button type="submit"
							class="w-1/2 py-2 px-4 bg-violet-600 text-white font-bold rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">Consultar
							<i class="ml-3 fa-solid fa-eye"></i></button>
					</div>
				</form>

				@if(isset($totalesDiarios))
				<h2 class="text-xl font-bold mt-5 text-center">Resultados de la Consulta</h2>
				<div class="overflow-x-auto">
					<div class="inline-block min-w-full overflow-hidden rounded-lg">
						<table class="min-w-full">
							<thead class="bg-violet-950 text-white">
								<tr>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Fecha</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Propina</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Efectivo</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Yappy</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Visa</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Mastercard</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Descuento
										Productos</th>
									<th class="py-2 px-4 border-b border-gray-300 text-center text-white font-extrabold">Total</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($totalesDiarios as $fecha => $totales)
								<tr class="hover:bg-gray-50 text-center">
									<td class="py-2 px-4 border-b border-gray-200">{{ $fecha }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['propina'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['efectivo'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['yappy'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['visa'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['mastercard'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['descuento_productos'] }}</td>
									<td class="py-2 px-4 border-b border-gray-200">{{ $totales['total'] }}</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot class="bg-gray-100 text-gray-800">
								<tr class="text-center">
									<td colspan="1" class="text-right font-bold py-2 px-4">Totales</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['propina'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['efectivo'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['yappy'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['visa'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['mastercard'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['descuento_productos'] }}</td>
									<td class="py-2 px-4">{{ $totalesAcumulados['total'] }}</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="flex justify-center mt-4">
					<form method="POST" action="{{ route('admin.generarPDF') }}">
						@csrf
						<input type="hidden" name="idEmpleado" value="{{ request('idEmpleado') }}">
						<input type="hidden" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
						<input type="hidden" name="fecha_final" value="{{ request('fecha_final') }}">
						<button type="submit"
							class="w-full py-2 px-4 bg-violet-600 text-white font-bold rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">Generar
							PDF <i class="ml-3 fa-solid fa-download"></i></button>
					</form>
				</div>
				@endif
			</div>
		</main>
	</div>
</div>
@endsection