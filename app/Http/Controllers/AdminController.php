<?php

namespace App\Http\Controllers;

use App\Models\TipoTX;
use App\Models\Empleado;
use App\Models\Servicio;
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
			$servicios = Servicio::all()->groupBy('tipo_servicio');
      $empleados = Empleado::where('status', 'activa')->get();

			// Pasar los métodos de pago a la vista
			return view('admin.transacciones', compact('metodosPago', 'servicios', 'empleados'));
    }

    public function reporte()
    {
        return view('admin.reporte');
    }

    public function servicios()
    {
        return view('admin.servicio.create');
    }

		public function comprobante(){
			return view('admin.comprobante');
		}
}