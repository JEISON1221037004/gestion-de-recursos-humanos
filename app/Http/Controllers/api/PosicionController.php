<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Posicion;
use Illuminate\Http\Request;

class PosicionController extends Controller
{
    public function index()
    {
        $posiciones = Posicion::all();
        return response()->json($posiciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $posicion = Posicion::create($request->all());
        return response()->json($posicion, 201);
    }

    public function show($id)
    {
        $posicion = Posicion::find($id);

        if (!$posicion) {
            return response()->json(['message' => 'Posicion not found'], 404);
        }

        return response()->json($posicion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $posicion = Posicion::find($id);

        if (!$posicion) {
            return response()->json(['message' => 'Posicion not found'], 404);
        }

        $posicion->update($request->all());
        return response()->json($posicion);
    }

    public function destroy($id)
    {
        $posicion = Posicion::find($id);

        if (!$posicion) {
            return response()->json(['message' => 'Posicion not found'], 404);
        }

        $posicion->delete();
        return response()->json(null, 204);
    }
}
