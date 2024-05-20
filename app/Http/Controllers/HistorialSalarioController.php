<?php

namespace App\Http\Controllers;

use App\Models\HistorialSalario;
use App\Models\Empleado;
use Illuminate\Http\Request;


class HistorialSalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historial_salarios = HistorialSalario::with('empleado')->get();
        return view('historial_salarios.index', compact('historial_salarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('historial_salarios.new', compact('empleados'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'salario_anterior' => 'required|numeric',
            'salario_nuevo' => 'required|numeric',
            'fecha_cambio' => 'required|date',
        ]);

        HistorialSalario::create($request->all());
        return redirect()->route('historial_salarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(HistorialSalario $historialSalario)
    {
        $empleados = Empleado::all();
        return view('historial_salarios.edit', compact('historialSalario', 'empleados'));
    }

    public function update(Request $request, HistorialSalario $historialSalario)
    {
        $request->validate([
            'empleado_id' => 'exists:empleados,id',
            'salario_anterior' => 'numeric',
            'salario_nuevo' => 'numeric',
            'fecha_cambio' => 'date',
        ]);

        $historialSalario->update($request->all());
        return redirect()->route('historial_salarios.index');
    }

    public function destroy(HistorialSalario $historialSalario)
    {
        $historialSalario->delete();
        return redirect()->route('historial_salarios.index');
    }
}
