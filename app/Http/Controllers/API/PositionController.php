<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return Position::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $position = Position::create($validated);

        return response()->json($position, 201);
    }

    public function show(Position $position)
    {
        return $position;
    }

    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'department_id' => 'sometimes|required|exists:departments,id',
        ]);

        $position->update($validated);

        return response()->json($position);
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return response()->json(null, 204);
    }
}
