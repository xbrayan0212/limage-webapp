@extends('layouts.admin')

@section('content')
<div class="w-10/12 flex justify-center mt-4 mx-auto">
	<main class="w-full flex p-4 bg-white rounded-lg shadow-md">
		<div class="w-full">
			<h1 class="pb-3 text-3xl text-center font-bold">Citas Agendadas</h1>
			<!-- Línea divisora -->
			<hr class="w-full border-t border-gray-300 my-4"
				style="border-top: none; height: 1px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);">
			<div class="overflow-auto rounded-lg">
				<table class="min-w-full bg-white">
					<thead class="bg-violet-950 text-white">
						<tr>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'idCita', 'sortOrder' => ($sortField === 'idCita' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									ID @if ($sortField === 'idCita')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'idEmpleado', 'sortOrder' => ($sortField === 'idEmpleado' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									Empleado @if ($sortField === 'idEmpleado')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'idServicio', 'sortOrder' => ($sortField === 'idServicio' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									Servicio @if ($sortField === 'idServicio')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'fecha', 'sortOrder' => ($sortField === 'fecha' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									Fecha @if ($sortField === 'fecha')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'duracion', 'sortOrder' => ($sortField === 'duracion' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									Duración @if ($sortField === 'duracion')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
							<th class="py-3 px-4 text-left border-b border-gray-300">
								<a
									href="{{ route('admin.citas', ['sortField' => 'status', 'sortOrder' => ($sortField === 'status' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}">
									Estado @if ($sortField === 'status')<i
										class="fas fa-sort-{{ $sortOrder === 'asc' ? 'up' : 'down' }}"></i>@endif
								</a>
							</th>
						</tr>
					</thead>
					<tbody class="text-gray-700">
						@foreach($citas as $cita)
						<tr class="hover:bg-gray-50 {{ $loop->even ? 'bg-gray-200' : '' }}">
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->idCita }}</td>
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->empleado->nombre }} {{ $cita->empleado->apellido
								}}</td>
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->servicio->servicio_detalle }}</td>
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->fecha }}</td>
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->duracion }} minutos</td>
							<td class="py-3 px-4 border-b border-gray-200">{{ $cita->status }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</main>
</div>
@endsection