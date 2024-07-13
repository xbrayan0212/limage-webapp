<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
	public function create()
	{
			return view('admin.servicio.create');
	}

	public function store(Request $request)
	{
			$request->validate([
					'tipo_servicio' => 'required|max:50',
					'servicio_detalle' => 'required|max:255',
			]);

			Servicio::create($request->all());
			return redirect()->route('servicio.create')->with('success', 'Servicio creado correctamente.');
	}
}
