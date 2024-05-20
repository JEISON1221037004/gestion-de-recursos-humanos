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
    public function edit(Evaluacion $evaluacion)
    {
        $empleados = Empleado::all();
        return view('evaluaciones.edit', compact('evaluacion', 'empleados'));
    }

    public function update(Request $request, Evaluacion $evaluacion)
    {
        $request->validate([
            'empleado_id' => 'exists:empleados,id',
            'evaluador_id' => 'exists:empleados,id',
            'fecha' => 'date',
            'puntuacion' => 'integer',
            'comentarios' => 'string',
        ]);

        $evaluacion->update($request->all());
        return redirect()->route('evaluaciones.index');
    }

    public function destroy(Evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index');
    }
}
