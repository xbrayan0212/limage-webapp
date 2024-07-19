@extends('layouts.admin')

@section('content')
<!-- Envío de Comprobante -->
<div class="w-auto flex mt-4">
	<main class="w-full flex p-4 bg-white rounded-lg shadow-md gap-12">
		<div class="w-full rounded-lg">
			<h1 class="pb-3 text-3xl text-center font-bold">Gestión de Comprobantes</h1>

			<!-- Línea divisora -->
			<hr class="w-full border-t border-gray-300 my-4"
				style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">

			<!-- Formulario de Filtro por Fecha -->
			<form method="GET" action="{{ route('admin.comprobante') }}" class="mb-4 flex justify-start gap-6">
				<div class="mb-4 w-3/2">
					<label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
					<input type="date" id="fecha" name="fecha"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						value="{{ request('fecha', date('Y-m-d')) }}">
				</div>
				<div class="mb-4 flex items-end">
					<button type="submit"
						class="px-4 py-2 bg-violet-600 text-white rounded-md hover:bg-violet-600 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50 font-bold">Filtrar</button>
				</div>
			</form>

				<!-- Modal de éxito -->
				@if (session('success'))
				<div id="successModal" class="fixed z-10 inset-0 overflow-y-auto">
					<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
						<div class="fixed inset-0 transition-opacity" aria-hidden="true">
							<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
						</div>
	
						<!-- Modal -->
						<div
							class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
							<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
								<div class="sm:flex sm:items-start">
									<div
										class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
										<svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
											xmlns="http://www.w3.org/2000/svg">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
										</svg>
									</div>
									<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
										<h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
											¡Éxito!
										</h3>
										<div class="mt-2">
											<p class="text-md text-gray-500 font-semibold">
												{{ session('success') }}
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="bg-violet-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
								<button type="button"
									class="mt-3 w-full inline-flex justify-center rounded-md border border-violet-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-violet-700 hover:bg-violet-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
									onclick="document.getElementById('successModal').style.display='none'">
									Cerrar
								</button>
							</div>
						</div>
					</div>
				</div>
				@endif
	
			<div class="inline-block min-w-full overflow-hidden rounded-lg shadow-md">
				<table class="min-w-full bg-white">
					<thead class="bg-violet-950 text-white">
						<tr>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Correo
								Electrónico</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Trabajadora
							</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Servicio
							</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Monto
								Servicio</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">ITBMS</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Monto Total
							</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Estado</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Adjuntar
								PDF</th>
							<th class="py-2 px-4 border-b border-gray-300 text-center text-white uppercase font-extrabold">Comprobante
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transacciones as $transaccion)
						@php
						$comprobante = App\Models\ComprobanteDigital::where('idTransaccion', $transaccion->idTransaccion)->first();
						@endphp
						<tr class="hover:bg-gray-50 text-center">
							<td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->email }}</td>
							<td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->empleado->nombre }} {{
								$transaccion->empleado->apellido }}</td>
							<td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->servicio->servicio_detalle }}</td>
							<td class="py-2 px-4 border-b border-gray-200">$ {{ $transaccion->precio_servicio }}</td>
							<td class="py-2 px-4 border-b border-gray-200">$ {{ $transaccion->itbms }}</td>
							<td class="py-2 px-4 border-b border-gray-200">$ {{ $transaccion->precio_servicio + $transaccion->itbms }}
							</td>
							<td class="py-2 px-4 border-b border-gray-200">
								<span
									class="{{ $comprobante && $comprobante->status == 'enviado' ? 'bg-green-500/50 text-green-900 font-medium px-3 py-1 border-solid border-2 border-green-500 rounded-full' : 'bg-yellow-500/50 text-yellow-900 font-medium border-solid border-2 border-yellow-500 px-3 py-1 rounded-full' }}">
									{{ $comprobante ? $comprobante->status : 'pendiente' }}
								</span>
							</td>
							<td class="py-2 px-4 border-b border-gray-200">
								<form method="POST" action="{{ route('admin.enviarComprobante', $transaccion->idTransaccion) }}"
									enctype="multipart/form-data">
									@csrf
									<input type="file" name="comprobante"
										class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"
										accept="application/pdf">
							</td>
							<td class="py-2 px-4 border-b border-gray-200 text-center">
								<button type="submit"
									class="px-4 py-2 bg-violet-600 text-white rounded-md font-bold hover:bg-violet-600" {{ $comprobante &&
									$comprobante->status == 'enviado' ? 'disabled' : '' }}>Enviar</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
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

		if ({{ session('success') ? 'true' : 'false' }
	}) {
		$('#successModal').show();
	}
	});
</script>
@endsection