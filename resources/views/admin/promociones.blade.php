@extends('layouts.admin')

@section('content')
<div class="w-full flex flex-col items-center mt-4 px-4">
    <main class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
        <!-- Sección de Subir Promoción -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6">SUBIR PROMOCIÓN</h2>
            <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="titulo" class="block text-lg font-semibold mb-2">Título:</label>
                    <input type="text" name="titulo" id="titulo" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="descripcion" class="block text-lg font-semibold mb-2">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div>
                    <label for="imagen" class="block text-lg font-semibold mb-2">Imagen:</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*" required class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Crear Promoción</button>
            </form>
        </section>


    </main>
</div>
@endsection
