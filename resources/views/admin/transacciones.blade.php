@extends('layouts.admin')

@section('content')

<div class="w-6/12 flex justify-center mt-4 mx-auto">
    <main class="w-full flex p-4 bg-white rounded-lg shadow-md">
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4 text-center">REGISTRO DE TRANSACCIÓN</h2>
            <form class="flex flex-col items-center">
                <div class="mb-4 w-1/2">
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

                <div class="mb-4 w-1/2">
                    <label for="trabajadora" class="block text-sm font-medium text-gray-700">Trabajadora</label>
                    <select id="trabajadora" name="trabajadora" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
                        <option>Seleccione una trabajadora</option>
                        @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->idEmpleado }}">{{ $empleado->nombre }} {{ $empleado->apellido }} ({{ $empleado->especialidad }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 w-1/2">
                    <label for="monto" class="block text-sm font-medium text-gray-700">Monto del servicio</label>
                    <input type="number" id="monto" name="monto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
                </div>

                <div class="mb-4 w-1/2">
                    <label for="tipo_tx" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                    <select id="tipo_tx" name="tipo_tx" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
                        <option>Seleccione un método de pago</option>
                        @foreach ($metodosPago as $metodo)
                        <option value="{{ $metodo->idTipoTX }}">{{ $metodo->nombre_tipo_tx }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4 w-1/2">
                    <label for="itbms" class="block text-sm font-medium text-gray-700">ITBMS</label>
                    <input type="number" id="itbms" name="itbms" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00" readonly>
                </div>

                <div class="flex w-1/2 justify-between">
                    <div class="mb-4 w-5/12">
                        <span class="block text-sm font-medium text-gray-700">¿Hay propina?</span>
                        <div class="mt-1 flex items-center">
                            <input type="radio" id="propina_si" name="propina_opcion" value="si" class="mr-2 hover:bg-violet-600 active:bg-violet-700 focus:ring-violet-300 checked:bg-violet-900">
                            <label for="propina_si" class="mr-4">Sí</label>
                            <input type="radio" id="propina_no" name="propina_opcion" value="no" class="mr-2 over:bg-violet-600 active:bg-violet-700 focus:ring-violet-300 checked:bg-violet-900" checked>
                            <label for="propina_no">No</label>
                        </div>
                    </div>

                    <div class="mb-4 w-5/12">
                        <span class="block text-sm font-medium text-gray-700">¿Hubo venta de producto?</span>
                        <div class="mt-1 flex items-center">
                            <input type="radio" id="venta_producto_si" name="venta_producto_opcion" value="si" class="mr-2 over:bg-violet-600 active:bg-violet-700 focus:ring-violet-300 checked:bg-violet-900">
                            <label for="venta_producto_si" class="mr-4">Sí</label>
                            <input type="radio" id="venta_producto_no" name="venta_producto_opcion" value="no" class="mr-2 over:bg-violet-600 active:bg-violet-700 focus:ring-violet-300 checked:bg-violet-900" checked>
                            <label for="venta_producto_no">No</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4 w-1/2 transform transition-all duration-500 ease-in-out opacity-0 max-h-0 overflow-hidden" id="propina_monto_div">
                    <label for="propina_monto" class="block text-sm font-medium text-gray-700">Monto de la Propina</label>
                    <input type="number" id="propina_monto" name="propina_monto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
                </div>

                <div class="mb-4 w-1/2 transform transition-all duration-500 ease-in-out opacity-0 max-h-0 overflow-hidden" id="venta_producto_div">
                    <label for="producto" class="block text-sm font-medium text-gray-700">Producto</label>
                    <select id="producto" name="producto" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
                        {{-- <option>Seleccione un producto</option>
                        @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="mb-4 w-1/2">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label> 
                    <textarea id="descripcion" name="descripcion" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="Ingrese una descripción"></textarea>
                </div>

								<hr class="w-full border-t border-gray-300 my-4" style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">


								<div class="flex w-1/2 justify-between">
									<div class="mb-4 w-5/12">
										<label for="monto_empleado" class="block text-sm font-medium text-gray-700">Trabajadora</label>
										<input type="number" name="monto_empleado" id="monto_empleado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00" readonly>
									</div>
									<div class="mb-4 w-5/12">
										<label for="monto_salon" class="block text-sm font-medium text-gray-700">Salon</label>
										<input type="number" name="monto_salon" id="monto_salon" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00" readonly>
									</div>
								</div>
								
                <div class="mb-4 w-1/2">
                    <label for="total" class="block text-sm font-medium text-gray-700">Total de la Transacción</label>
                    <input type="number" id="total" name="total" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00" readonly>
                </div>

                <div class="flex justify-center w-full">
                    <button type="submit" class="justify-center w-1/3 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Registrar Transacción <i class="ml-3 fa-solid fa-download"></i></button>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
	
    $(document).ready(function() {

			function actualizarSalon() {
				var monto = parseFloat($('#monto').val()) / 2 || 0;
				var itbms = parseFloat($('#itbms').val()) || 0;
				// var montoProductos = parseFloat($('#productos').val());
				var totalSalon = monto + itbms;
				$('#monto_salon').val(totalSalon.toFixed(2));
			}

			function actualizarTrabajadora() {
				var monto = parseFloat($('#monto').val()) / 2 || 0;
				var propina = parseFloat($('#propina_monto').val()) || 0;
				var totalTrabajadoras = monto + propina;
				$('#monto_empleado').val(totalTrabajadoras.toFixed(2))
			}

        // Función para actualizar el total
        function actualizarTotal() {
            var monto = parseFloat($('#monto').val()) || 0;
            var itbms = parseFloat($('#itbms').val()) || 0;
            var propina = parseFloat($('#propina_monto').val()) || 0;
            var total = monto + itbms + propina;
            $('#total').val(total.toFixed(2));
        }

        // Manejar el cambio en el select de método de pago
        $('#tipo_tx').change(function() {
            var nombreMetodo = $('#tipo_tx option:selected').text().toLowerCase();
            if (nombreMetodo.includes('visa') || nombreMetodo.includes('mastercard')) {
                var montoServicio = parseFloat($('#monto').val()) || 0;
                var itbmsValue = (montoServicio * 0.07).toFixed(2);
                $('#itbms').val(itbmsValue).prop('readonly', true);
            } else {
                $('#itbms').val('').prop('readonly', true);
            }
						actualizarSalon();
            actualizarTotal();
        });

        // Manejar el cambio en el monto del servicio
        $('#monto').on('input', function() {
					
            var nombreMetodo = $('#tipo_tx option:selected').text().toLowerCase();
            if (nombreMetodo.includes('visa') || nombreMetodo.includes('mastercard')) {
                var montoServicio = parseFloat($('#monto').val()) || 0;
                var itbmsValue = (montoServicio * 0.07).toFixed(2);
                $('#itbms').val(itbmsValue).prop('readonly', true);
            }
						actualizarSalon();
						actualizarTrabajadora();
            actualizarTotal();
        });

        // Manejar el cambio en el monto de la propina
        $('#propina_monto').on('input', function() {
						actualizarTrabajadora();
            actualizarTotal();
        });

        // Manejar el cambio en la opción de propina
        $('input[name="propina_opcion"]').change(function() {
            if ($('#propina_si').is(':checked')) {
                $('#propina_monto_div').removeClass('opacity-0 max-h-0').addClass('opacity-100 max-h-screen p-px');
                $('#propina_monto').prop('disabled', false);
            } else {
                $('#propina_monto_div').removeClass('opacity-100 max-h-screen p-px').addClass('opacity-0 max-h-0');
                $('#propina_monto').prop('disabled', true).val('');
            }
            actualizarTotal();
        });

        // Manejar el cambio en la opción de venta de producto
        $('input[name="venta_producto_opcion"]').change(function() {
            if ($('#venta_producto_si').is(':checked')) {
                $('#venta_producto_div').removeClass('opacity-0 max-h-0').addClass('opacity-100 max-h-screen p-px');
                $('#producto').prop('disabled', false);
            } else {
                $('#venta_producto_div').removeClass('opacity-100 max-h-screen p-px').addClass('opacity-0 max-h-0');
                $('#producto').prop('disabled', true).val('');
            }
        });
    });
</script>

@endsection
