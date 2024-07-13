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
							<option>Select</option>
						</select>
					</div>
					<div class="mb-4">
						<label for="trabajadora" class="block text-sm font-medium text-gray-700">Trabajadora</label>
						<select id="trabajadora" name="trabajadora" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm">
							<option>Select</option>
						</select>
					</div>
					<div class="mb-4">
						<label for="monto" class="block text-sm font-medium text-gray-700">Monto total del servicio</label>
						<input type="number" id="monto" name="monto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
					</div>
					<div class="mb-4">
						<label for="itbms" class="block text-sm font-medium text-gray-700">ITBMS</label>
						<input type="number" id="itbms" name="itbms" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
					</div>
					<div class="mb-4">
						<label for="propina" class="block text-sm font-medium text-gray-700">Propina</label>
						<input type="number" id="propina" name="propina" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" placeholder="0.00">
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
@endsection