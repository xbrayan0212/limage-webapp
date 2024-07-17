<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Productos;
use App\Models\Servicio;
use App\Models\TipoTX;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
	public function create()
	{
			$servicios = Servicio::all(); // Asume que tienes un modelo Servicio
			$empleados = Empleado::all(); // Asume que tienes un modelo Empleado
			$metodosPago = TipoTX::all(); // Asume que tienes un modelo FormaPago
			$productos = Productos::all(); // Asume que tienes un modelo Producto

			return view('admin.transaccion.create', compact('servicios', 'empleados', 'metodosPago', 'productos'));
	}

	public function store(Request $request)
	{
			$request->validate([
					'fecha' => 'required|date',
					'idServicio' => 'required|exists:servicio,idServicio',
					'idEmpleado' => 'required|exists:empleados,idEmpleado',
					'precio_servicio' => 'required|numeric',
					'idTipoTX' => 'required|exists:tipos_tx,idTipoTX',
					'itbms' => 'nullable|numeric',
					'descuento_producto' => 'nullable|numeric',
					'propina' => 'nullable|numeric',
					'email' => 'nullable|email',
					'idProducto' => 'nullable|exists:productos,idProducto',
					'descripcion' => 'nullable|string|max:255',
					'total_transaccion' => 'required|numeric',
					'monto_salon' => 'required|numeric',
					'monto_empleado' => 'required|numeric',
			]);

			Transaccion::create([
				'fecha' => $request->fecha,
				'idServicio' => $request->idServicio,
				'idEmpleado' => $request->idEmpleado,
				'precio_servicio' => $request->precio_servicio,
				'idTipoTX' => $request->idTipoTX,
				'itbms' => $request->itbms,
				'descuento_producto' => $request->descuento_producto,
				'propina' => $request->propina,
				'email' => $request->email,
				'idProducto' => $request->idProducto,
				'descripcion' => $request->descripcion,
				'total_transaccion' => $request->total_transaccion,
				'monto_salon' => $request->monto_salon,
				'monto_empleado' => $request->monto_empleado,
		]);

		return redirect()->route('transaccion.create')->with('success', 'Transacción registrada exitosamente');
	}
}
