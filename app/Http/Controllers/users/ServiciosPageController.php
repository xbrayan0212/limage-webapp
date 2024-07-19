<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servicio;

class ServiciosPageController extends Controller
{
    public function create()
    {
             // Obtener todos los servicios de la base de datos
             $servicios = Servicio::all();

             // Pasar los servicios a la vista
             return view('users.servicio', compact('servicios'));

    }


}



