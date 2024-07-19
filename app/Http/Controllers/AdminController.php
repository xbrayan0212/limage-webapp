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
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
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
		
		// Calcular el monto total descontado
    $transacciones->each(function($transaccion) {
			$transaccion->monto_descuento = $transaccion->descuento_producto * $transaccion->precio_servicio;
		});

		// Calcular el total de todos los descuentos
		$totalDescuentos = $transacciones->sum('monto_descuento');


		$trabajadoras = Empleado::all();
		$tipos_tx = TipoTX::all();

		return view('admin.dashboard', compact('transacciones', 'trabajadoras', 'tipos_tx', 'totalDescuentos'));
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
		$empleados = Empleado::where('status', 'activa')->get();
		return view('admin.reporte', compact('empleados'));
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

	public function generarPDF(Request $request)
{
    $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
    ], [
        'fecha_final.after_or_equal' => 'La fecha final debe ser mayor o igual a la fecha de inicio.',
    ]);

    $query = Transaccion::query();

    if ($request->filled('idEmpleado')) {
        $query->where('idEmpleado', $request->idEmpleado);
    }

    if ($request->filled('fecha_inicio') && $request->filled('fecha_final')) {
        $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_final]);
    }

    $transacciones = $query->with(['empleado', 'servicio'])->get();

    // Agrupar transacciones por día y calcular totales
    $totalesDiarios = $transacciones->groupBy(function ($date) {
        return \Carbon\Carbon::parse($date->fecha)->format('Y-m-d');
    })->map(function ($day) {
        return [
            'propina' => $day->sum('propina'),
            'efectivo' => $day->where('idTipoTX', 1)->sum('total_transaccion'),
            'yappy' => $day->where('idTipoTX', 2)->sum('total_transaccion'),
            'visa' => $day->where('idTipoTX', 3)->sum('total_transaccion'),
            'mastercard' => $day->where('idTipoTX', 4)->sum('total_transaccion'),
            'descuento_productos' => $day->sum(function($transaccion) {
                return $transaccion->descuento_producto * $transaccion->precio_servicio;
            }),
            'total' => $day->sum('total_transaccion'),
        ];
    });

    // Calcular los totales acumulados
    $totalesAcumulados = [
        'propina' => $totalesDiarios->sum('propina'),
        'efectivo' => $totalesDiarios->sum('efectivo'),
        'yappy' => $totalesDiarios->sum('yappy'),
        'visa' => $totalesDiarios->sum('visa'),
        'mastercard' => $totalesDiarios->sum('mastercard'),
        'descuento_productos' => $totalesDiarios->sum('descuento_productos'),
        'total' => $totalesDiarios->sum('total'),
    ];

    $data = [
        'transacciones' => $transacciones,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_final' => $request->fecha_final,
        'totalesDiarios' => $totalesDiarios,
        'totalesAcumulados' => $totalesAcumulados,
    ];

    $pdf = FacadePdf::loadView('admin.reporte_financiero_pdf', $data)->setPaper('a4', 'landscape');
    return $pdf->download('reporte_financiero.pdf');
}


	public function consultarReporte(Request $request)
	{
			$request->validate([
					'fecha_inicio' => 'required|date',
					'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
			], [
					'fecha_final.after_or_equal' => 'La fecha final debe ser mayor o igual a la fecha de inicio.',
			]);
	
			$query = Transaccion::query();
	
			if ($request->filled('idEmpleado')) {
					$query->where('idEmpleado', $request->idEmpleado);
			}
	
			if ($request->filled('fecha_inicio') && $request->filled('fecha_final')) {
					$query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_final]);
			}
	
			$transacciones = $query->with(['empleado', 'servicio'])->get();
	
			// Agrupar transacciones por día y calcular totales
			$totalesDiarios = $transacciones->groupBy(function ($date) {
					return \Carbon\Carbon::parse($date->fecha)->format('Y-m-d');
			})->map(function ($day) {
					return [
							'propina' => $day->sum('propina'),
							'efectivo' => $day->where('idTipoTX', 1)->sum('total_transaccion'),
							'yappy' => $day->where('idTipoTX', 2)->sum('total_transaccion'),
							'visa' => $day->where('idTipoTX', 3)->sum('total_transaccion'),
							'mastercard' => $day->where('idTipoTX', 4)->sum('total_transaccion'),
							'descuento_productos' => $day->sum(function($transaccion) {
                return $transaccion->descuento_producto * $transaccion->precio_servicio;
            	}),
							'total' => $day->sum('total_transaccion'),
					];
			});
	
			// Calcular los totales acumulados
			$totalesAcumulados = [
					'propina' => $totalesDiarios->sum('propina'),
					'efectivo' => $totalesDiarios->sum('efectivo'),
					'yappy' => $totalesDiarios->sum('yappy'),
					'visa' => $totalesDiarios->sum('visa'),
					'mastercard' => $totalesDiarios->sum('mastercard'),
					'descuento_productos' => $totalesDiarios->sum('descuento_productos'),
					'total' => $totalesDiarios->sum('total'),
			];
	
			$empleados = Empleado::where('status', 'activa')->get();
	
			return view('admin.reporte', compact('totalesDiarios', 'totalesAcumulados', 'empleados'))->with([
					'fecha_inicio' => $request->fecha_inicio,
					'fecha_final' => $request->fecha_final,
					'idEmpleado' => $request->idEmpleado
			]);
	}
	
	
}
