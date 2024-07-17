<?php

namespace App\Http\Controllers;

use App\Models\TipoTX;
use App\Models\Empleado;
use App\Models\Servicio;
use App\Models\Productos;
use App\Models\Comprobante;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Mail\ComprobanteMailable;
use App\Models\ComprobanteDigital;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
	public function index(Request $request)
	{
		$query = Transaccion::query();

		// Filtrar por trabajadora
		if ($request->filled('trabajadora')) {
			$query->where('idEmpleado', $request->trabajadora);
		}

		// Filtrar por tipo de TX
		if ($request->filled('tipo_tx')) {
			$query->where('idTipoTX', $request->tipo_tx);
		}


		// Filtrar por fecha si está seleccionada
		if ($request->filled('fecha')) {
			$query->whereDate('fecha', $request->fecha);
		} else {
			// Filtrar por fecha actual por defecto
			$query->whereDate('fecha', today());
		}


		$transacciones = $query->with(['empleado', 'servicio', 'tipoTX'])->get();

		$trabajadoras = Empleado::all();
		$tipos_tx = TipoTX::all();

		return view('admin.dashboard', compact('transacciones', 'trabajadoras', 'tipos_tx'));
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
		$metodosPago = TipoTX::all();
		$servicios = Servicio::all();
		$empleados = Empleado::where('status', 'activa')->get();
		$productos = Productos::all();

		return view('admin.transaccion.create', compact('metodosPago', 'servicios', 'empleados', 'productos'));
	}

	public function reporte()
	{
		return view('admin.reporte');
	}

	public function servicios()
	{
		return view('admin.servicio.create');
	}

	public function comprobante(Request $request)
	{
		// Obtener la fecha actual si no se proporciona una fecha
		$fecha = $request->input('fecha', date('Y-m-d'));

		// Filtrar transacciones por fecha y por método de pago (Visa o Mastercard)
		$transacciones = Transaccion::whereDate('fecha', $fecha)
			->whereIn('idTipoTX', [3, 4])
			->with(['empleado', 'servicio'])
			->get();

		// Calcular el monto total y el nombre completo de la trabajadora para cada transacción
		foreach ($transacciones as $transaccion) {
			$transaccion->nombre_completo_trabajadora = $transaccion->empleado->nombre . ' ' . $transaccion->empleado->apellido;
			$transaccion->monto_total = $transaccion->precio_servicio + $transaccion->itbms;
		}

		// Pasar la fecha y las transacciones a la vista
		return view('admin.comprobante', compact('transacciones', 'fecha'));
	}

	public function enviarComprobante(Request $request, $id)
	{
		$request->validate([
			'comprobante' => 'required|mimes:pdf|max:2048',
		]);

		$transaccion = Transaccion::with('empleado', 'servicio')->findOrFail($id);

		// Guardar el archivo PDF en el almacenamiento público
		$pdfPath = $request->file('comprobante')->storeAs('public/comprobantes', 'comprobante_' . $id . '.pdf');

		$data = [
			'nombreTrabajadora' => $transaccion->empleado->nombre . ' ' . $transaccion->empleado->apellido,
			'montoServicio' => $transaccion->precio_servicio,
			'itbms' => $transaccion->itbms,
			'montoTotal' => $transaccion->precio_servicio + $transaccion->itbms,
		];

		$toEmail = $transaccion->email;

		// Usar la ruta completa del archivo almacenado
		$fullPdfPath = storage_path('app/' . $pdfPath);

		Mail::to($toEmail)->send(new ComprobanteMailable($data, $fullPdfPath, $toEmail));

		// Crear o actualizar el comprobante digital asociado a la transacción
		ComprobanteDigital::updateOrCreate(
			['idTransaccion' => $id],
			[
				'fecha_emision' => now(),
				'monto' => $transaccion->precio_servicio + $transaccion->itbms,
				'detalle' => 'Detalles del comprobante',
				'status' => 'enviado'
			]
		);

		return redirect()->back()->with('success', 'Comprobante enviado exitosamente.');
	}
}
