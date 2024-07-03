<div class=" flex justify-center">
  <div class="w-1/2 p-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Generar Reporte Financiero</h2>
    {{-- <form method="POST" action="{{ route('reportes.financieros.store') }}"> --}}
		<form method="POST">
      @csrf
      <div class="mb-4">
        <label for="idEmpleado" class="block text-sm font-medium text-gray-700">Empleado</label>
        <select id="idEmpleado" name="idEmpleado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <!-- Asegúrate de que los empleados estén disponibles en el controlador y se pasen a la vista -->
          {{-- @foreach($empleados as $empleado)
            <option value="{{ $empleado->idEmpleado }}">{{ $empleado->nombre }}</option>
          @endforeach --}}
        </select>
      </div>
      <div class="mb-4">
        <label for="mes" class="block text-sm font-medium text-gray-700">Mes</label>
        <input type="month" id="mes" name="mes" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      {{-- <div class="mb-4">
        <label for="ingresos_totales" class="block text-sm font-medium text-gray-700">Ingresos Totales</label>
        <input type="number" step="0.01" id="ingresos_totales" name="ingresos_totales" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0.00">
      </div>
      <div class="mb-4">
        <label for="gastos_totales" class="block text-sm font-medium text-gray-700">Gastos Totales</label>
        <input type="number" step="0.01" id="gastos_totales" name="gastos_totales" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0.00">
      </div>
      <div class="mb-4">
        <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
        <input type="number" step="0.01" id="balance" name="balance" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="0.00">
      </div> --}}
      <button type="submit" class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">Generar Reporte</button>
    </form>
  </div>
</div>
