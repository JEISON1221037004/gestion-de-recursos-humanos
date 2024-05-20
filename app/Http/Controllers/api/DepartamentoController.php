<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'nullable|string',
        ]);

        $departamento = Departamento::create($request->all());
        return response()->json($departamento, 201);
    }

    public function show($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'Departamento not found'], 404);
        }

        return response()->json($departamento);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'ubicacion' => 'nullable|string',
        ]);

        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'Departamento not found'], 404);
        }

        $departamento->update($request->all());
        return response()->json($departamento);
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['message' => 'Departamento not found'], 404);
        }

        $departamento->delete();
        return response()->json(null, 204);
    }
}
