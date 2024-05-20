<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::with('empleado')->get();
        return response()->json($evaluaciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        $evaluacion = Evaluacion::create($request->all());
        return response()->json($evaluacion, 201);
    }

    public function show($id)
    {
        $evaluacion = Evaluacion::find($id);

        if (!$evaluacion) {
            return response()->json(['message' => 'Evaluacion not found'], 404);
        }

        return response()->json($evaluacion);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empleado_id' => 'exists:empleados,id',
            'fecha' => 'date',
            'comentarios' => 'nullable|string',
        ]);

        $evaluacion = Evaluacion::find($id);

        if (!$evaluacion) {
            return response()->json(['message' => 'Evaluacion not found'], 404);
        }

        $evaluacion->update($request->all());
        return response()->json($evaluacion);
    }

    public function destroy($id)
    {
        $evaluacion = Evaluacion::find($id);

        if (!$evaluacion) {
            return response()->json(['message' => 'Evaluacion not found'], 404);
        }

        $evaluacion->delete();
        return response()->json(null, 204);
    }
}

