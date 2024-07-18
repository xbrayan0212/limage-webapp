<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servicio; // Importar el modelo Servicio
use App\Models\Empleado; // Importar el modelo Empleado
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function create()
    {
        // Lógica para mostrar el formulario de agendar cita
        return view('users.agendarCita');
    }

    public function showForm()
    {
        // Obtener el mes actual
        $currentMonth = date('n');

        // Obtener los meses desde el actual hasta el final del año
        $monthsOfYear = range($currentMonth, 12);
        $monthNames = [];
        foreach ($monthsOfYear as $month) {
            $monthNames[$month] = date('F', mktime(0, 0, 0, $month, 1));
        }

        // Obtener servicios y trabajadoras desde la base de datos
        $servicesFromDB = Servicio::all()->groupBy('tipo_servicio');
        $services = [];

        foreach ($servicesFromDB as $key => $value) {
            $services[$key] = [];

            foreach ($value as $servicio) {
                $services[$key][] = [
                    'idServicio' => $servicio->idServicio,
                    'servicio_detalle' => $servicio->servicio_detalle,
                ];
            }
        }

        $specialties = [
            'Peluquera',
            'Lashista',
            'Manicurista',
            'servicios_extras' // Asegúrate de incluir 'servicios_extras' aquí
        ];

        // Obtener trabajadoras activas
        $workers = Empleado::where('status', 'activa')->get();

        // Pasar datos a la vista
        return view('users.agendarCita', compact('services', 'specialties', 'workers', 'monthNames'));
    }



    public function submitForm(Request $request)
{
    // Verificar si el usuario está autenticado
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors(['general' => 'Debes iniciar sesión para realizar una reserva.']);
    }

    // Validar los datos del formulario
    $request->validate([
        'hora' => 'required',
        'mes' => 'required',
        'dia' => 'required',
        'cabello' => 'nullable|integer',
        'trabajadora_peluquera' => 'nullable|integer|required_with:cabello',
        'unas' => 'nullable|integer',
        'trabajadora_manicurista' => 'nullable|integer|required_with:unas',
        'cejas_pestanas_depilaciones' => 'nullable|integer',
        'trabajadora_lashista' => 'nullable|integer|required_with:cejas_pestanas_depilaciones',
        'servicios_especiales' => 'nullable|integer',
        'trabajadora_servicios_extras' => 'nullable|integer|required_with:servicios_especiales',
    ], [
        'required' => 'Este campo es obligatorio.',
        'required_with' => 'Este campo es obligatorio cuando el servicio correspondiente está seleccionado.',
    ]);

    // Verificar que al menos una cita esté seleccionada
    if (!$request->hasAny(['cabello', 'unas', 'cejas_pestanas_depilaciones', 'servicios_especiales'])) {
        return back()->withErrors(['general' => 'Debe seleccionar al menos una cita.'])->withInput();
    }

    // Construir la fecha con la hora usando Carbon
    $fecha = date('Y') . '-' . $request->mes . '-' . $request->dia . ' ' . str_replace('hora', '', $request->hora);

    // Arreglo para almacenar las citas
    $citas = [];

    // Crear instancias de Cita para cada tipo de servicio y trabajadora
    if ($request->cabello && $request->trabajadora_peluquera) {
        $citas[] = new Cita([
            'idEmpleado' => $request->trabajadora_peluquera,
            'idServicio' => $request->cabello,
            'fecha' => $fecha,
            'duracion' => '01:00:00',
            'status' => 'pendiente',
            'user_id' => Auth::id(),
        ]);
    }

    if ($request->unas && $request->trabajadora_manicurista) {
        $citas[] = new Cita([
            'idEmpleado' => $request->trabajadora_manicurista,
            'idServicio' => $request->unas,
            'fecha' => $fecha,
            'duracion' => '01:00:00',
            'status' => 'pendiente',
            'user_id' => Auth::id(),
        ]);
    }

    if ($request->cejas_pestanas_depilaciones && $request->trabajadora_lashista) {
        $citas[] = new Cita([
            'idEmpleado' => $request->trabajadora_lashista,
            'idServicio' => $request->cejas_pestanas_depilaciones,
            'fecha' => $fecha,
            'duracion' => '01:00:00',
            'status' => 'pendiente',
            'user_id' => Auth::id(),
        ]);
    }

    if ($request->servicios_especiales && $request->trabajadora_servicios_extras) {
        $citas[] = new Cita([
            'idEmpleado' => $request->trabajadora_servicios_extras,
            'idServicio' => $request->servicios_especiales,
            'fecha' => $fecha,
            'duracion' => '01:00:00',
            'status' => 'pendiente',
            'user_id' => Auth::id(),
        ]);
    }

    if (count($citas) == 0) {
        return back()->withErrors(['general' => 'Debe seleccionar al menos una cita.'])->withInput();
    }

    // Guardar todas las citas en la base de datos
    foreach ($citas as $cita) {
        $cita->save();
    }

    return back()->with('success', 'Formulario enviado correctamente.');
    
}

}
