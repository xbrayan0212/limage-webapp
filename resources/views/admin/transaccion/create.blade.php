@extends('layouts.admin')

@section('content')
<div class="w-6/12 flex justify-center mt-4 mx-auto">
	<main class="w-full flex p-4 bg-white rounded-lg shadow-md">
		<div class="w-full">
			<h1 class="pb-3 text-3xl text-center font-bold">Registro de Transacciones</h1>

			<!-- Línea divisora -->
			<hr class="w-full border-t border-gray-300 my-4"
				style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">

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


			<form action="{{ route('transaccion.store') }}" method="POST" class="flex flex-col items-center">
				@csrf
				<!-- Campo de fecha -->
				<div class="mb-4 w-1/2">
					<label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
					<input type="date" id="fecha" name="fecha"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						readonly>
				</div>

				<div class="mb-4 w-1/2">
					<label for="idServicio" class="block text-sm font-medium text-gray-700">Servicio</label>
					<select id="idServicio" name="idServicio"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option>Seleccione un servicio</option>
						@foreach ($servicios as $servicio)
						<option value="{{ $servicio->idServicio }}">{{ $servicio->servicio_detalle }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-4 w-1/2">
					<label for="idEmpleado" class="block text-sm font-medium text-gray-700">Trabajadora</label>
					<select id="idEmpleado" name="idEmpleado"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option>Seleccione una trabajadora</option>
						@foreach ($empleados as $empleado)
						<option value="{{ $empleado->idEmpleado }}">{{ $empleado->nombre }} {{ $empleado->apellido }} ({{
							$empleado->especialidad }})</option>
						@endforeach
					</select>
				</div>

				<div class="flex w-1/2 justify-between">
					<div class="mb-4 w-5/12">
						<label for="precio_servicio" class="block text-sm font-medium text-gray-700">Monto del servicio</label>
						<input type="number" id="precio_servicio" name="precio_servicio"
							class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
							placeholder="0.00">
					</div>

					<div class="mb-4 w-5/12">
						<label for="idTipoTX" class="block text-sm font-medium text-gray-700">Método de Pago</label>
						<select id="idTipoTX" name="idTipoTX"
							class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
							<option></option>
							@foreach ($metodosPago as $metodo)
							<option value="{{ $metodo->idTipoTX }}">{{ $metodo->nombre_tipo_tx }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="mb-4 w-1/2 transform transition-all duration-500 ease-in-out opacity-0 max-h-0 overflow-hidden"
					id="email_cliente_div">
					<label for="email" class="block text-sm font-medium text-gray-700">Email del Cliente</label>
					<input type="email" id="email" name="email"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						autocomplete="off" readonly>
				</div>

				<div class="mb-4 w-1/2">
					<label for="itbms" class="block text-sm font-medium text-gray-700">ITBMS</label>
					<input type="number" id="itbms" name="itbms"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						placeholder="0.00" readonly>
				</div>

				<div class="mb-4 w-1/2">
					<label for="descuento_producto" class="block text-sm font-medium text-gray-700">Descuento de producto</label>
					<select id="descuento_producto" name="descuento_producto"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option value="0">Seleccione un descuento</option>
						<option value="0.05">5%</option>
						<option value="0.10">10%</option>
						<option value="0.15">15%</option>
						<option value="0.20">20%</option>
						<option value="0.25">25%</option>
					</select>
				</div>

				<div class="flex w-1/2 justify-between">
					<div class="mb-4 w-5/12">
						<span class="block text-sm font-medium text-gray-700">¿Hay propina?</span>
						<div class="mt-1 flex items-center">
							<input type="radio" id="propina_si" name="propina_opcion" value="si" class="mr-2">
							<label for="propina_si" class="mr-4">Sí</label>
							<input type="radio" id="propina_no" name="propina_opcion" value="no" class="mr-2" checked>
							<label for="propina_no">No</label>
						</div>
					</div>

					<div class="mb-4 w-5/12">
						<span class="block text-sm font-medium text-gray-700">¿Hubo venta de producto?</span>
						<div class="mt-1 flex items-center">
							<input type="radio" id="venta_producto_si" name="venta_producto_opcion" value="si" class="mr-2">
							<label for="venta_producto_si" class="mr-4">Sí</label>
							<input type="radio" id="venta_producto_no" name="venta_producto_opcion" value="no" class="mr-2" checked>
							<label for="venta_producto_no">No</label>
						</div>
					</div>
				</div>

				<div class="mb-4 w-1/2 transform transition-all duration-500 ease-in-out opacity-0 max-h-0 overflow-hidden"
					id="propina_monto_div">
					<label for="propina" class="block text-sm font-medium text-gray-700">Monto de la Propina</label>
					<input type="number" id="propina" name="propina" value="0"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						placeholder="0.00" readonly>
				</div>

				<div class="mb-4 w-1/2 transform transition-all duration-500 ease-in-out opacity-0 max-h-0 overflow-hidden"
					id="venta_producto_div">
					<label for="idProducto" class="block text-sm font-medium text-gray-700">Producto</label>
					<select id="idProducto" name="idProducto"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
						<option value="">Seleccione un producto</option>
						@foreach ($productos as $producto)
						<option value="{{ $producto->idProducto }}" data-precio="{{ $producto->precio_producto }}">{{
							$producto->nombre_producto }}</option>
						@endforeach
					</select>
				</div>

				<div class="mb-4 w-1/2">
					<label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
					<textarea id="descripcion" name="descripcion"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						placeholder="Ingrese una descripción"></textarea>
				</div>

				<div class="mb-4 w-1/2">
					<label for="total_transaccion" class="block text-sm font-medium text-gray-700">Total de la Transacción</label>
					<input type="number" id="total_transaccion" name="total_transaccion"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						placeholder="0.00" readonly>
				</div>

				<div class="flex w-1/2 justify-between">
					<div class="mb-4 w-5/12">
						<label for="monto_salon" class="block text-sm font-medium text-gray-700">Monto para el Salón</label>
						<input type="number" id="monto_salon" name="monto_salon"
							class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
							placeholder="0.00" readonly>
					</div>

					<div class="mb-4 w-5/12">
						<label for="monto_empleado" class="block text-sm font-medium text-gray-700">Monto para la
							Trabajadora</label>
						<input type="number" id="monto_empleado" name="monto_empleado"
							class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
							placeholder="0.00" readonly>
					</div>
				</div>

				<div class="flex justify-center w-full">
					<button type="submit"
						class="justify-center w-1/3 py-2 px-4 bg-violet-600 text-white font-bold rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">Registrar
						Transacción <i class="ml-3 fa-solid fa-download"></i></button>
				</div>
			</form>
		</div>
	</main>
</div>

<script>
	$(document).ready(function () {
		// Establecer la fecha actual en el campo de fecha
		var today = moment.tz("America/Panama").format("YYYY-MM-DD");
		$('#fecha').val(today);

		// Función para actualizar el total
		function actualizarTotal() {
			var monto = parseFloat($('#precio_servicio').val()) || 0;
			var descuento = parseFloat($('#descuento_producto').val()) || 0;
			var montoDescuento = monto * descuento;
			var montoConDescuento = monto - montoDescuento;

			var itbms = parseFloat($('#itbms').val()) || 0;
			var propina = parseFloat($('#propina').val()) || 0;
			var producto = parseFloat($('#idProducto option:selected').data('precio')) || 0;
			var total = montoConDescuento + itbms + propina + producto;
			$('#total_transaccion').val(total.toFixed(2));

			actualizarSalon(montoConDescuento, itbms, producto);
			actualizarTrabajadora(montoConDescuento, propina);
		}

		function actualizarSalon(monto, itbms, producto) {
			var montoSalon = (monto / 2) + itbms + producto;
			$('#monto_salon').val(montoSalon.toFixed(2));
		}

		function actualizarTrabajadora(monto, propina) {
			var montoTrabajadora = (monto / 2) + propina;
			$('#monto_empleado').val(montoTrabajadora.toFixed(2));
		}

		// Manejar el cambio en el select de método de pago
		$('#idTipoTX').change(function () {
			var nombreMetodo = $('#idTipoTX option:selected').text().toLowerCase();
			if (nombreMetodo.includes('visa') || nombreMetodo.includes('mastercard')) {
				var montoServicio = parseFloat($('#precio_servicio').val()) || 0;
				var itbmsValue = (montoServicio * 0.07).toFixed(2);
				$('#itbms').val(itbmsValue).prop('readonly', true);
				$('#email_cliente_div').removeClass('opacity-0 max-h-0').addClass('opacity-100 max-h-screen p-px');
				$('#email').prop('readonly', false);
			} else {
				$('#itbms').val('0.00').prop('readonly', true);
				$('#email_cliente_div').removeClass('opacity-100 max-h-screen p-px').addClass('opacity-0 max-h-0');
				$('#email').prop('readonly', true).val('');
			}
			actualizarTotal();
		});

		// Manejar el cambio en el monto del servicio
		$('#precio_servicio, #idTipoTX').on('input change', function () {
			var nombreMetodo = $('#idTipoTX option:selected').text().toLowerCase();
			var montoServicio = parseFloat($('#precio_servicio').val()) || 0;
			var itbmsValue = 0;

			if (nombreMetodo.includes('visa') || nombreMetodo.includes('mastercard')) {
				itbmsValue = (montoServicio * 0.07).toFixed(2);
			}

			$('#itbms').val(itbmsValue).prop('readonly', true);
			actualizarTotal();
		});

		// Manejar el cambio en el monto de la propina
		$('#propina').on('input', function () {
			actualizarTotal();
		});

		// Manejar el cambio en el descuento de producto
		$('#descuento_producto').change(function () {
			actualizarTotal();
		});

		// Manejar el cambio en la opción de propina
		$('input[name="propina_opcion"]').change(function () {
			if ($('#propina_si').is(':checked')) {
				$('#propina_monto_div').removeClass('opacity-0 max-h-0').addClass('opacity-100 max-h-screen p-px');
				$('#propina').prop('readonly', false);
			} else {
				$('#propina_monto_div').removeClass('opacity-100 max-h-screen p-px').addClass('opacity-0 max-h-0');
				$('#propina').prop('readonly', true).val(0);
			}
			actualizarTotal();
		});

		// Manejar el cambio en la opción de venta de producto
		$('input[name="venta_producto_opcion"]').change(function () {
			if ($('#venta_producto_si').is(':checked')) {
				$('#venta_producto_div').removeClass('opacity-0 max-h-0').addClass('opacity-100 max-h-screen p-px');
				$('#idProducto').prop('readonly', false);
			} else {
				$('#venta_producto_div').removeClass('opacity-100 max-h-screen p-px').addClass('opacity-0 max-h-0');
				$('#idProducto').prop('readonly', true).val('');
			}
			actualizarTotal();
		});

		// Manejar el cambio en el select de producto
		$('#idProducto').change(function () {
			actualizarTotal();
		});

		// Mostrar modal de éxito si hay un mensaje de éxito
		if ("{{ session('success') }}") {
			$('#successModal').show();
		}

		// Cerrar el modal de éxito
		$('#successModal button').click(function () {
			$('#successModal').hide();
		});
	});
</script>

@endsection