<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::with(['empleado', 'evaluador'])->get();
        return view('evaluaciones.index', compact('evaluaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleado::all();
        return view('evaluaciones.new', compact('empleados'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'evaluador_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'puntuacion' => 'required|integer',
            'comentarios' => 'required|string',
        ]);

        Evaluacion::create($request->all());
        return redirect()->route('evaluaciones.index');
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
