<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        return Salary::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
        ]);

        $salary = Salary::create($validated);

        return response()->json($salary, 201);
    }

    public function show(Salary $salary)
    {
        return $salary;
    }

    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'employee_id' => 'sometimes|required|exists:employees,id',
            'amount' => 'sometimes|required|numeric',
        ]);

        $salary->update($validated);

        return response()->json($salary);
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return response()->json(null, 204);
    }
}
