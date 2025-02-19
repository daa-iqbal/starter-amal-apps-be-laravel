<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Resources\ProgressResource;
use App\Models\User;

class ProgressController extends Controller
{
    public function index()
    {
        $progress = Progress::latest()->get();

        return ProgressResource::collection($progress);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'charity_id' => 'required|exists:charities,id',
            'date' => 'required|date',
            'status' => 'nullable|integer'
        ]);
        $data['user_id'] = User::where('username', $request->user)->first()->id;

        $progress = Progress::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Progress Created Successfully',
            'data' => new ProgressResource($progress)
        ]);
    }

    public function show(Request $request)
    {
        $progress = Progress::where('user_id', auth()->id())->where('date', $request->date)->get();

        return response()->json([
            'data' => ProgressResource::collection($progress)
        ]);
    }

    public function update(Request $request, Progress $progress)
    {
        $data = $request->validate([
            'charity_id' => 'required|exists:charities,id',
            'date' => 'required|date',
            'status' => 'nullable|integer'
        ]);
        $data['user_id'] = User::where('username', $request->user)->first()->id;

        $progress->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Progress Edited Successfully',
            'data' => new ProgressResource($progress)
        ]);
    }

    public function destroy(Progress $progress)
    {
        $progress->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Progress Deleted Successfully'
        ]);
    }
}
