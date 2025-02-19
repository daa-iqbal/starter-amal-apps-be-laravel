<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Performance;
use Illuminate\Http\Request;
use App\Http\Resources\PerformanceResource;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::latest()->get();

        return PerformanceResource::collection($performances);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $performance = Performance::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Performance Created Successfully',
            'data' => new PerformanceResource($performance)
        ]);
    }

    public function show(User $user)
    {
        $performances = Performance::latest()->get();

        $data = $performances->map(function ($performance) use ($user) {
            $percentage = $performance->percentages()->where('user_id', $user->id)->first();

            return [
                'id' => $performance->id,
                'name' => $performance->name,
                'percent' => $percentage ? $percentage->percent : null,
            ];
        });

        return response()->json([
            'data' => $data
        ]);
    }



    public function update(Request $request, Performance $performance)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $performance->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Performance Edited Successfully',
            'data' => new PerformanceResource($performance)
        ]);
    }

    public function destroy(Performance $performance)
    {
        $performance->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Performance Deleted Successfully'
        ]);
    }
}
