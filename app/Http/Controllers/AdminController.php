<?php

namespace App\Http\Controllers;

use App\Models\TipoTX;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\Productos;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.dashboard');
	}

	public function citas()
	{
		return view('admin.citas');
	}

	public function promociones()
	{
		return view('admin.promociones');
	}

	public function transacciones()
	{
		// Recuperar todos los tipos de transacción desde la base de datos
		$metodosPago = TipoTX::all();
		$servicios = Servicio::all();
		$empleados = Empleado::where('status', 'activa')->get();
		$productos = Productos::all();

		// Pasar los métodos de pago a la vista
		return view('admin.transaccion.create', compact('metodosPago', 'servicios', 'empleados', 'productos'));
		// return view('admin.transacciones.create');
	}

	public function reporte()
	{
		return view('admin.reporte');
	}

	public function servicios()
	{
		return view('admin.servicio.create');
	}

	public function comprobante()
	{
		// Filtrar transacciones solo con Visa o Mastercard
		$transacciones = Transaccion::whereIn('idTipoTX', [3, 4]) // Asumiendo 1 y 2 son Visa y Mastercard
			->with(['empleado', 'servicio'])
			->get();

		foreach ($transacciones as $transaccion) {
			$transaccion->nombre_completo_trabajadora = $transaccion->empleado->nombre . ' ' . $transaccion->empleado->apellido;
		}

		return view('admin.comprobante', compact('transacciones'));
	}
}
