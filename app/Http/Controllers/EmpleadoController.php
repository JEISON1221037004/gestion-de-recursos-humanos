<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Posicion;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with(['departamento', 'posicion'])->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $posiciones = Posicion::all();
        return view('empleados.new', compact('departamentos', 'posiciones'));
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

        Empleado::create($request->all());
        return redirect()->route('empleados.index');
    }

    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        $posiciones = Posicion::all();
        return view('empleados.edit', compact('empleado', 'departamentos', 'posiciones'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'email' => 'email|unique:empleados,email,' . $empleado->id,
            'fecha_contratacion' => 'date',
            'departamento_id' => 'exists:departamentos,id',
            'posicion_id' => 'exists:posiciones,id',
            'salario' => 'numeric',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}

