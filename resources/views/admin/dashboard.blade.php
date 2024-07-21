@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
<div class="w-full flex flex-col h-screen overflow-y-hidden">
	<main class="w-full flex-grow p-4">
		<div class="w-full mt-12">
			<div class="bg-white rounded-lg p-4 shadow-md">
				<h1 class="pb-3 text-3xl text-center font-bold">Transacciones Diarias</h1>
				<!-- Línea divisora -->
				<hr class="w-full border-t border-gray-300 my-4"
					style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">
				<form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4">
					<div class="flex space-x-4">
						<div>
							<label for="trabajadora" class="block text-sm font-medium text-gray-700">Trabajadora</label>
							<select id="trabajadora" name="trabajadora"
								class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-violet-300 focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm rounded-md">
								<option value="">Todas</option>
								@foreach($trabajadoras as $trabajadora)
								<option value="{{ $trabajadora->idEmpleado }}" {{ request('trabajadora')==$trabajadora->idEmpleado ?
									'selected' : '' }}>
									{{ $trabajadora->nombre }} {{ $trabajadora->apellido }}
								</option>
								@endforeach
							</select>
						</div>
						<div>
							<label for="tipo_tx" class="block text-sm font-medium text-gray-700">Metodo de pago</label>
							<select id="tipo_tx" name="tipo_tx"
								class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-violet-300 focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm rounded-md ">
								<option value="">Todos</option>
								@foreach($tipos_tx as $tipo)
								<option value="{{ $tipo->idTipoTX }}" {{ request('tipo_tx')==$tipo->idTipoTX ? 'selected' : '' }}>
									{{ $tipo->nombre_tipo_tx }}
								</option>
								@endforeach
							</select>
						</div>
						<div>
							<label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
							<input type="date" id="fecha" name="fecha" value="{{ request('fecha', date('Y-m-d')) }}"
								class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-violet-300 focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm rounded-md">
						</div>
						<div class="flex items-end">
							<button type="submit" class="px-4 py-2 bg-violet-700 font-bold text-white rounded-md">Filtrar</button>
						</div>
					</div>
				</form>

				<div class=" inline-block min-w-full overflow-hidden rounded-lg">
					<table class="min-w-full bg-white">
						<thead class="bg-violet-950 text-white">
							<tr>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Fecha</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Trabajadora</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Detalle</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Servicio</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Propina</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Salón</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Trabajadora</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Descuento</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Precio Total</th>
								<th class="text-left py-3 px-4 uppercase font-extrabold text-sm">Método de Pago</th>
							</tr>
						</thead>
						<tbody class="text-gray-700">
							@foreach($transacciones as $transaccion)
							<tr class="hover:bg-gray-50 {{ $loop->index % 2 == 0 ? 'bg-gray-200' : '' }}">
								<td class="text-left py-3 px-4">{{ $transaccion->fecha }}</td>
								<td class="text-left py-3 px-4">{{ $transaccion->empleado->nombre }} {{
									$transaccion->empleado->apellido }}</td>
								<td class="text-left py-3 px-4">{{ $transaccion->servicio->servicio_detalle }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->precio_servicio }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->propina }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->monto_salon }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->monto_empleado }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->monto_descuento }}</td>
								<td class="text-left py-3 px-4">$ {{ $transaccion->total_transaccion }}</td>
								<td class="text-left py-3 px-4">{{ $transaccion->tipoTX->nombre_tipo_tx }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot class="bg-gray-100 text-gray-800">
							<tr>
								<td colspan="3" class="text-right py-3 px-4 uppercase font-semibold">Total</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $transacciones->sum('precio_servicio') }}
								</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $transacciones->sum('propina') }}</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $transacciones->sum('monto_salon') }}</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $transacciones->sum('monto_empleado') }}
								</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $totalDescuentos }}</td>
								<td class="text-left py-3 px-4 uppercase font-semibold">$ {{ $transacciones->sum('total_transaccion') }}
								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</main>
</div>

<script>
	$(document).ready(function () {
		const fechaInput = $('#fecha');
		const storedFecha = '{{ request('fecha') }}';

		if (!storedFecha) {
			const today = new Date();
			const year = today.getFullYear();
			const month = String(today.getMonth() + 1).padStart(2, '0');
			const day = String(today.getDate()).padStart(2, '0');
			const formattedDate = `${year}-${month}-${day}`;
			fechaInput.val(formattedDate);
		}
	});
</script>
@endsection