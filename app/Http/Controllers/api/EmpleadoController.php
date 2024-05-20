<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with(['departamento', 'posicion'])->get();
        return response()->json($empleados);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'fecha_contratacion' => 'required|date',
            'departamento_id' => 'required|exists:departamentos,id',
            'posicion_id' => 'required|exists:posiciones,id',
            'salario' => 'required|numeric',
        ]);

        $empleado = Empleado::create($request->all());
        return response()->json($empleado, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado not found'], 404);
        }

        return response()->json($empleado);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'email' => 'email|unique:empleados,email,' . $id,
            'fecha_contratacion' => 'date',
            'departamento_id' => 'exists:departamentos,id',
            'posicion_id' => 'exists:posiciones,id',
            'salario' => 'numeric',
        ]);

        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado not found'], 404);
        }

        $empleado->update($request->all());
        return response()->json($empleado);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado not found'], 404);
        }

        $empleado->delete();
        return response()->json(null, 204);
    }
}
