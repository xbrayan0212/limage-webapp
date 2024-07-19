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
            'foto' => 'required|image',
        ]);

        $path = $request->file('foto')->store('promociones', 'public');

        Promocion::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'foto' => $path,
        ]);

        return redirect()->route('promociones.index')->with('success', 'Promoción creada con éxito');
    }

    public function destroy(Promocion $promocion)
    {
        if (file_exists(storage_path('app/public/' . $promocion->foto))) {
            unlink(storage_path('app/public/' . $promocion->foto));
        }

        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada con éxito');
    }
}
