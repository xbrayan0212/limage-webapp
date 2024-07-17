@extends('layouts.admin')

@section('content')
<!-- Envío de Comprobante -->
<div class="w-9/12 flex mt-4">
    <main class="w-full flex p-4 bg-white rounded-lg shadow-md gap-12">
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-4 text-center pb-4">ENVÍO DE COMPROBANTE</h2>
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Correo Electrónico</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Trabajadora</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Servicio</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">ITBMS</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Monto Total</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Adjuntar PDF</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-600 font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transacciones as $transaccion)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->empleado->nombre }} {{ $transaccion->empleado->apellido }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->servicio->servicio_detalle }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->itbms }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $transaccion->total_transaccion }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="comprobante" accept="application/pdf" class="block w-full text-sm text-violet-900 bg-violet-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none">
                                </form>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <form method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-violet-500 text-white rounded-md hover:bg-violet-600">Enviar Comprobante</button>
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
