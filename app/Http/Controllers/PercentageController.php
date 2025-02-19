<?php

namespace App\Http\Controllers;

use App\Models\Percentage;
use Illuminate\Http\Request;
use App\Http\Resources\PercentageResource;

class PercentageController extends Controller
{
    public function index()
    {
        $percentages = Percentage::latest()->get();

        return PercentageResource::collection($percentages);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'performances' => 'required|array',
            'performances.*.user_id' => 'required|integer|exists:users,id',
            'performances.*.id' => 'required|integer|exists:performances,id',
            'performances.*.percent' => 'nullable|numeric|min:0|max:100'
        ]);

        foreach ($data['performances'] as $performance) {
            $percentage = Percentage::firstOrNew([
                'user_id' => $performance['user_id'],
                'performance_id' => $performance['id']
            ]);

            $percentage->percent = $performance['percent'];
            $percentage->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Percentage Created Successfully',
            'data' => PercentageResource::collection(Percentage::whereIn('user_id', array_column($data['performances'], 'user_id'))->get())
        ]);
    }

    public function show(Percentage $percentage)
    {
        return response()->json([
            'data' => new PercentageResource($percentage)
        ]);
    }

    public function update(Request $request, Percentage $percentage)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'performance_id' => 'required|exists:performances,id',
            'percent' => 'required|integer'
        ]);

        $percentage->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Percentage Edited Successfully',
            'data' => new PercentageResource($percentage)
        ]);
    }

    public function destroy(Percentage $percentage)
    {
        $percentage->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Percentage Deleted Successfully'
        ]);
    }
}
