<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use App\Http\Resources\CoachResource;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::latest()->get();

        return CoachResource::collection($coaches);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'matery' => 'required|string|max:255',
            'date' => 'required|date',
            'attendance' => 'required|date_format:H:i',
            'information' => 'nullable',
            'signature' => 'nullable|string|max:255'
        ]);

        $coach = Coach::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Coach Created Successfully',
            'data' => new CoachResource($coach)
        ]);
    }

    public function show()
    {
        $coaches = Coach::where('user_id', auth()->id())->get();

        return response()->json([
            'data' => CoachResource::collection($coaches)
        ]);
    }

    public function update(Request $request, Coach $coach)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'matery' => 'required|string|max:255',
            'date' => 'required|date',
            'attendance' => 'required|date_format:H:i',
            'information' => 'nullable',
            'signature' => 'nullable|string|max:255'
        ]);

        $coach->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Coach Edited Successfully',
            'data' => new CoachResource($coach)
        ]);
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Coach Deleted Successfully'
        ]);
    }
}
