<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\HistorialSalario;
use Illuminate\Http\Request;

class HistorialSalarioController extends Controller
{
    public function index()
    {
        $historialSalarios = HistorialSalario::with('empleado')->get();
        return response()->json($historialSalarios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'salario' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $historialSalario = HistorialSalario::create($request->all());
        return response()->json($historialSalario, 201);
    }

    public function show($id)
    {
        $historialSalario = HistorialSalario::find($id);

        if (!$historialSalario) {
            return response()->json(['message' => 'Historial Salario not found'], 404);
        }

        return response()->json($historialSalario);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empleado_id' => 'exists:empleados,id',
            'salario' => 'numeric',
            'fecha' => 'date',
        ]);

        $historialSalario = HistorialSalario::find($id);

        if (!$historialSalario) {
            return response()->json(['message' => 'Historial Salario not found'], 404);
        }

        $historialSalario->update($request->all());
        return response()->json($historialSalario);
    }

    public function destroy($id)
    {
        $historialSalario = HistorialSalario::find($id);

        if (!$historialSalario) {
            return response()->json(['message' => 'Historial Salario not found'], 404);
        }

        $historialSalario->delete();
        return response()->json(null, 204);
    }
}
