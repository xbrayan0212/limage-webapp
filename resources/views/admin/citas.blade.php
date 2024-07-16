
<x-app-layout>
    <div id="contenido" class="w-full mt-12">
        <h1 class="text-xl pb-3 flex items-center">
            <i class="fas fa-calendar mr-3"></i> Citas Programadas
        </h1>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Fecha</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Hora</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Cliente</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Empleado</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Servicio</th>
                        <th class="w-1/6 text-left py-3 px-4 uppercase font-semibold text-sm">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($citas as $cita)
                    <tr class="{{ $loop->even ? 'bg-gray-200' : '' }}">
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->fecha }}</td>
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->hora }}</td>
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->cliente->nombre }}</td>
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->empleado->nombre }}</td>
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->servicio->nombre }}</td>
                        <td class="w-1/6 text-left py-3 px-4">{{ $cita->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $citas->links() }}
        </div>
    </div>
</x-app-layout>
