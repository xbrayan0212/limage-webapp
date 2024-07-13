@extends('layouts.admin')

@section('content')
<div class=" flex justify-center">
  <div class="w-1/2 p-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Crear Servicio</h2>
		@if ($errors->any())
      <div class="mb-4">
        <ul>
          @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    @if (session('success'))
      <div class="mb-4 text-green-500">
        {{ session('success') }}
      </div>
    @endif
    <form action="{{ route('servicio.store') }}" method="POST">
        @csrf
				<div class="mb-4">
					<label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de Servicio</label>
					<select id="tipo_servicio" name="tipo_servicio" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
						<option value="cabello">Cabello</option>
            <option value="cejas_pestanas_depilaciones">Cejas, Pestañas y Depilaciones</option>
            <option value="unas">Uñas</option>
            <option value="servicios_especiales">Servicios Especiales</option>
					</select>
				</div>
				<div class="mb-4">
					<label for="servicio_detalle" class="block text-sm font-medium text-gray-700">Detalle del Servicio: </label>
					<input type="text" id="servicio_detalle" name="servicio_detalle" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required maxlength="255">
				</div>
				<button type="submit" class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Guardar Servicio</button>
    </form>
	</div>
</div>
@endsection