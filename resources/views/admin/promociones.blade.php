<x-app-layout>
    <div id="contenido" class="w-full mt-12">
        <h1 class="text-2xl font-bold mb-6">GENERACIÓN DE PROMOCIONES</h1>
        <form action="{{ route('promociones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="banner" class="block mb-1">Ingrese el banner</label>
                <input id="banner" name="banner" type="file" class="w-full border border-purple-500 rounded p-2" required />
            </div>
            <div>
                <label for="title" class="block mb-1">Titulo Promoción</label>
                <input id="title" name="title" type="text" placeholder="Ingrese un encabezado" class="w-full border border-purple-500 rounded p-2" required />
            </div>
            <div>
                <label for="type" class="block mb-1">Tipo de Promocion</label>
                <select id="type" name="type" class="w-full border border-purple-500 rounded p-2" required>
                    <option value="">Select</option>
                </select>
            </div>
            <div>
                <label for="description" class="block mb-1">Descripción</label>
                <textarea id="description" name="description" placeholder="Ingrese una descripción" class="w-full border border-purple-500 rounded p-2" required></textarea>
            </div>
            <div>
                <label for="date-range" class="block mb-1">Fecha Inicio-Final</label>
                <input id="date-range" name="date_range" type="text" class="w-full border border-purple-500 rounded p-2" placeholder="Seleccionar fecha" required />
            </div>
            <button type="submit" class="bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700">Publicar Promoción</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateRangeInput = document.getElementById('date-range');
            new Pikaday({ field: dateRangeInput });
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
</x-app-layout>
