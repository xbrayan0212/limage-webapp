@extends('layouts.admin')

@section('content')
<div class="w-6/12 flex justify-center mt-4 mx-auto">
	<main class="w-full flex p-4 bg-white rounded-lg shadow-md">
		<div class="w-full">
		
			<h2 class="text-2xl font-bold mb-4 text-center">Creación de Promociones</h2>

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

			<form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
				@csrf
				<div class="mb-4 w-1/2">
					<label for="titulo"  class="block text-sm font-medium text-gray-700">Título</label>
					<input type="text" name="titulo" id="titulo" required
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Título de la promoción">
				</div>

				<div class="mb-4 w-1/2">
					<label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
					<textarea id="descripcion" name="descripcion"
						class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm"
						placeholder="Ingrese una descripción"></textarea>
				</div>

				<div class="mb-4 w-1/2">
					<label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
					<input type="file" name="imagen" id="imagen" accept="image/*" required
					class="block w-full text-sm border rounded-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
				</div>
				<div class="flex justify-center w-full">
				<button type="submit"
				class="justify-center w-1/3 py-2 px-4 bg-violet-600 text-white font-bold rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">Crear
					Promoción <i class="ml-3 fa-solid fa-upload"></i></button>
				</div>
			</form>

		</div>
	</main>
</div>
@endsection