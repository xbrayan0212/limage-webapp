@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
<div class="w-full flex flex-col h-screen overflow-y-hidden">
	<div class="w-full overflow-x-hidden border-t flex flex-col">
		<main class="w-full flex-grow p-4">
			<div id="contenido">
				<div class="w-full mt-12">
					<h1 class="text-xl pb-3 flex items-center">
						<i class="fas fa-list mr-3"></i> Transacciones Diarias
					</h1>
					<div class="bg-white overflow-auto p-4">
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
									<input type="date" id="fecha" name="fecha" value="{{ request('fecha') }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
								</div>
								<div class="flex items-end">
									<button type="submit" class="px-4 py-2 bg-violet-700 font-bold text-white rounded-md">Filtrar</button>
								</div>
							</div>
						</form>

						<table class="min-w-full bg-white border border-violet-200">
							<thead class="bg-violet-950 text-white">
								<tr>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Fecha</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Trabajadora</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Servicio</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Monto del Servicio</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Monto del Salón</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Monto de la Trabajadora</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Precio Total</th>
									<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Método de Pago</th>
								</tr>
							</thead>
							<tbody class="text-gray-700">
								@foreach($transacciones as $transaccion)
								<tr class="hover:bg-gray-50 {{ $loop->index % 2 == 0 ? 'bg-gray-200' : '' }}">
									<td class="text-left py-3 px-4">{{ $transaccion->fecha }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->empleado->nombre }} {{
										$transaccion->empleado->apellido }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->servicio->servicio_detalle }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->precio_servicio }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->monto_salon }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->monto_empleado }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->total_transaccion }}</td>
									<td class="text-left py-3 px-4">{{ $transaccion->tipoTX->nombre_tipo_tx }}</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot class="bg-gray-100 text-gray-800">
								<tr>
									<td colspan="3" class="text-right py-3 px-4 font-semibold">Total:</td>
									<td class="text-left py-3 px-4 font-semibold">{{ $transacciones->sum('precio_servicio') }}</td>
									<td class="text-left py-3 px-4 font-semibold">{{ $transacciones->sum('monto_salon') }}</td>
									<td class="text-left py-3 px-4 font-semibold">{{ $transacciones->sum('monto_empleado') }}</td>
									<td class="text-left py-3 px-4 font-semibold">{{ $transacciones->sum('total_transaccion') }}</td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
@endsection