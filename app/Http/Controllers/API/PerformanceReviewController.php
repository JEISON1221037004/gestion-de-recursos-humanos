<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PerformanceReview;
use Illuminate\Http\Request;

class PerformanceReviewController extends Controller
{
    public function index()
    {
        return PerformanceReview::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'review' => 'required|string',
            'score' => 'required|integer|min=1|max=5',
        ]);

        $performanceReview = PerformanceReview::create($validated);

        return response()->json($performanceReview, 201);
    }

    public function show(PerformanceReview $performanceReview)
    {
        return $performanceReview;
    }

    public function update(Request $request, PerformanceReview $performanceReview)
    {
        $validated = $request->validate([
            'employee_id' => 'sometimes|required|exists:employees,id',
            'review' => 'sometimes|required|string',
            'score' => 'sometimes|required|integer|min=1|max=5',
        ]);

        $performanceReview->update($validated);

        return response()->json($performanceReview);
    }

    public function destroy(PerformanceReview $performanceReview)
    {
        $performanceReview->delete();

        return response()->json(null, 204);
    }
}
