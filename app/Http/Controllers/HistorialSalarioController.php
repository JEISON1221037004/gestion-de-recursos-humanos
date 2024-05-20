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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
