@extends('layouts.admin')

@section('content')
<div class="w-10/12 flex justify-center mt-4 mx-auto">
    <main class="w-full flex p-4 bg-white rounded-lg shadow-md">
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4 text-center">Lista de Citas</h2>
            <div class="overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'idCita', 'sortOrder' => ($sortField === 'idCita' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    ID @if ($sortField === 'idCita')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'idEmpleado', 'sortOrder' => ($sortField === 'idEmpleado' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    Empleado @if ($sortField === 'idEmpleado')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'idServicio', 'sortOrder' => ($sortField === 'idServicio' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    Servicio @if ($sortField === 'idServicio')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'fecha', 'sortOrder' => ($sortField === 'fecha' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    Fecha @if ($sortField === 'fecha')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'duracion', 'sortOrder' => ($sortField === 'duracion' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    Duración @if ($sortField === 'duracion')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                            <th class="py-3 px-4 text-left">
                                <a href="{{ route('admin.citas', ['sortField' => 'status', 'sortOrder' => ($sortField === 'status' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
                                    Estado @if ($sortField === 'status')<i class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($citas as $cita)
                            <tr class="{{ $loop->even ? 'bg-gray-200' : '' }}">
                                <td class="py-3 px-4">{{ $cita->idCita }}</td>
                                <td class="py-3 px-4">{{ $cita->empleado->nombre }} {{ $cita->empleado->apellido }}</td>
                                <td class="py-3 px-4">{{ $cita->servicio->servicio_detalle }}</td>
                                <td class="py-3 px-4">{{ $cita->fecha }}</td>
                                <td class="py-3 px-4">{{ $cita->duracion }} minutos</td>
                                <td class="py-3 px-4">{{ $cita->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
