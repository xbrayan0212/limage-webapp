@extends('layouts.admin')

@section('content')
<div class="w-6/12 flex mt-4 justify-center mt-4 mx-auto">
    <main class="w-full flex p-4 bg-white rounded-lg shadow-md">
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4 text-center">Gestión de promociones</h2>

						<!-- Línea divisora -->
			<hr class="w-full border-t border-gray-300 my-4"
			style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">

            <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center ">
                @csrf
                <div class="mb-4 w-1/2">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" id="titulo" name="titulo" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required></textarea>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto de la Promoción</label>
										<input type="file" id="foto" name="foto" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" required>
                </div>
								<div class="flex justify-center w-full mt-4">
									<button type="submit" class="w-1/2 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Subir Promoción <i class="ml-3 fa-solid fa-upload"></i></button>
								</div>
            </form>
        </div>
    </main>
</div>
@endsection
