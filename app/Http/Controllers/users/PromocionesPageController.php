<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promocion;

class PromocionesPageController extends Controller
{
    public function create()
    {
        // Obtén todas las promociones
        $promociones = Promocion::all();

        // Pasa las promociones a la vista
        return view('users.promocionesU', compact('promociones'));
    }
}
