<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function create()
    {
        return view('promociones.create');
    }

    public function store(Request $request)
    {
        // Validar y manejar la subida del archivo
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/promociones'), $filename);

            // Aquí puedes almacenar el nombre del archivo en la base de datos si es necesario
        }

        return redirect()->route('promociones.create')->with('success', 'Promoción subida exitosamente');
    }
}
