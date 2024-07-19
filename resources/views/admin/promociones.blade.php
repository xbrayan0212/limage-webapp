@extends('layouts.admin')

@section('content')
<div class="w-9/12 flex mt-4">
    <main class="w-full flex p-4 bg-white rounded-lg shadow-md gap-12">
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4">SUBIR PROMOCIÓN</h2>
            <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" id="titulo" name="titulo" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto de la Promoción</label>
                    <input type="file" id="foto" name="foto" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-violet-500 focus:border-violet-500 sm:text-sm" required>
                </div>
                <button type="submit" class="w-1/2 py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Subir Promoción <i class="ml-3 fa-solid fa-upload"></i></button>
            </form>

            <h2 class="text-2xl font-bold mb-4 mt-8">LISTA DE PROMOCIONES</h2>
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 text-center text-gray-600 font-semibold">Título</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-center text-gray-600 font-semibold">Descripción</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-center text-gray-600 font-semibold">Foto</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-center text-gray-600 font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promociones as $promocion)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="py-2 px-4 border-b border-gray-200">{{ $promocion->titulo }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $promocion->descripcion }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <img src="{{ asset('storage/' . $promocion->foto) }}" alt="{{ $promocion->titulo }}" class="w-20 h-20 object-cover">
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <form action="{{ route('promociones.destroy', $promocion) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
