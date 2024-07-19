<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::all();
        return view('admin.promociones', compact('promociones'));
    }

    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image',
    ]);

    $path = $request->file('imagen')->store('promociones', 'public');

    Promocion::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen' => $path,
    ]);

    return redirect()->route('promociones.index')->with('success', 'Promoción creada con éxito');
}


    public function destroy(Promocion $promocion)
    {
        if (file_exists(storage_path('app/public/' . $promocion->imagen))) {
            unlink(storage_path('app/public/' . $promocion->imagen));
        }

        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada con éxito');
    }
}
