@extends('layouts.admin')

@section('content')

<div class="w-9/12 flex mt-4">
	<main class="w-full flex p-4 bg-white rounded-lg shadow-md gap-12">
		<div class="w-full">
			<h2 class="text-2xl font-bold mb-4">REGISTRO DE TRANSACCIÓN</h2>
			<form>

				<div class="mb-4">
					<label for="servicio" class="block text-sm font-medium text-gray-700">Servicio</label>
					<select id="servicio" name="servicio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option>Seleccione un servicio</option>
						@foreach ($servicios as $seccion => $serviciosPorSeccion)
						<optgroup label="{{ ucfirst($seccion) }}">
							@foreach ($serviciosPorSeccion as $servicio)
							<option value="{{ $servicio->idServicio }}">{{ $servicio->servicio_detalle }}</option>
							@endforeach
						</optgroup>
						@endforeach
					</select>
				</div>

				<div class="mb-4">
					<label for="trabajadora" class="block text-sm font-medium text-gray-700">Trabajadora</label>
					<select id="trabajadora" name="trabajadora" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option>Select</option>
					</select>
				</div>

				<div class="mb-4">
					<label for="monto" class="block text-sm font-medium text-gray-700">Monto del servicio</label>
					<input type="number" id="monto" name="monto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
				</div>

				<div class="mb-4">
					<label for="tipo_tx" class="block text-sm font-medium text-gray-700">Método de Pago</label>
					<select id="tipo_tx" name="tipo_tx" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option>Seleccione un método de pago</option>
						@foreach ($metodosPago as $metodo)
						<option value="{{ $metodo->idTipoTX }}">{{ $metodo->nombre_tipo_tx }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-4">
					<label for="itbms" class="block text-sm font-medium text-gray-700">ITBMS</label>
					<input type="number" id="itbms" name="itbms" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00" disabled>
				</div>

				<div class="mb-4">
					<span class="block text-sm font-medium text-gray-700">¿Hay propina?</span>
					<div class="mt-1 flex items-center">
						<input type="radio" id="propina_si" name="propina_opcion" value="si" class="mr-2">
						<label for="propina_si" class="mr-4">Sí</label>
						<input type="radio" id="propina_no" name="propina_opcion" value="no" class="mr-2" checked>
						<label for="propina_no">No</label>
					</div>
				</div>

				<div class="mb-4" id="propina_monto_div" style="display: none;">
					<label for="propina_monto" class="block text-sm font-medium text-gray-700">Monto de la Propina</label>
					<input type="number" id="propina_monto" name="propina_monto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
				</div>


				<button type="submit" class="w-1/2 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Registrar Transacción <i class="ml-3 fa-solid fa-download"></i></button>
			</form>
		</div>

		<!-- Envío de Comprobante -->
		<div class="w-full">
			<h2 class="text-2xl font-bold mb-4">ENVÍO DE COMPROBANTE</h2>
			<form>
				<div class="mb-4">
					<label for="correo" class="block text-sm font-medium text-gray-700">Correo del cliente</label>
					<input type="email" id="correo" name="correo" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
				</div>
				<button type="submit" class="w-1/2 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Enviar Comprobante <i class="ml-3 fa-solid fa-paper-plane"></i></button>
			</form>
		</div>
	</main>
</div>

<script>
	$(document).ready(function() {
		// Inicialmente deshabilitar ITBMS si el select está en la opción por defecto
		var nombreMetodoInicial = $('#tipo_tx option:selected').text().toLowerCase();
		if (!nombreMetodoInicial.includes('visa') && !nombreMetodoInicial.includes('mastercard')) {
			$('#itbms').prop('disabled', true);
		}

		// Manejar el cambio en el select de método de pago
		$('#tipo_tx').change(function() {
			var nombreMetodo = $('#tipo_tx option:selected').text().toLowerCase();
			if (nombreMetodo.includes('visa') || nombreMetodo.includes('mastercard')) {
				$('#itbms').prop('disabled', false);
			} else {
				$('#itbms').prop('disabled', true);
			}
		});

		// Manejar el cambio en la opción de propina
		$('input[name="propina_opcion"]').change(function() {
			if ($('#propina_si').is(':checked')) {
				$('#propina_monto_div').show();
				$('#propina_monto').prop('disabled', false);
			} else {
				$('#propina_monto_div').hide();
				$('#propina_monto').prop('disabled', true);
			}
		});
	});
</script>

@endsection