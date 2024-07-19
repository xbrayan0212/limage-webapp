<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->imagen->extension();
        $request->imagen->move(public_path('images'), $imageName);

        Promocion::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $imageName,
        ]);

        return redirect()->route('admin.promociones.index')->with('success', 'Promoción creada exitosamente.');
    }

    public function destroy(Promocion $promocion)
    {
        if (file_exists(public_path('images/'.$promocion->imagen))) {
            unlink(public_path('images/'.$promocion->imagen));
        }

        $promocion->delete();
        return redirect()->route('admin.promociones.index')->with('success', 'Promoción eliminada exitosamente.');
    }
}

