<?php

namespace App\Http\Controllers;

use App\Models\Posicion;
use Illuminate\Http\Request;

class PosicionController extends Controller
{
    public function index()
    {
        $posiciones = Posicion::all();
        return view('posiciones.index', compact('posiciones'));
    }

    public function create()
    {
        return view('posiciones.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Posicion::create($request->all());
        return redirect()->route('posiciones.index');
    }

    public function edit(Posicion $posicion)
    {
        return view('posiciones.edit', compact('posicion'));
    }

    public function update(Request $request, Posicion $posicion)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'string',
        ]);

        $posicion->update($request->all());
        return redirect()->route('posiciones.index');
    }

    public function destroy(Posicion $posicion)
    {
        $posicion->delete();
        return redirect()->route('posiciones.index');
    }
}

