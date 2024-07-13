<?php

namespace App\Http\Controllers;

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
        return view('admin.transacciones');
    }

    public function reporte()
    {
        return view('admin.reporte');
    }

    public function servicios()
    {
        return view('admin.servicio.create');
    }
}