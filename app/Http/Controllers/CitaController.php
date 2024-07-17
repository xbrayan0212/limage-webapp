<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->get('sortField', 'fecha');
        $sortOrder = $request->get('sortOrder', 'asc');

        $citas = Cita::with(['empleado', 'servicio'])
            ->orderBy($sortField, $sortOrder)
            ->get();

        return view('admin.citas', compact('citas', 'sortField', 'sortOrder'));
    }
}
