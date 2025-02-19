<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use Illuminate\Http\Request;
use App\Http\Resources\CharityResource;

class CharityController extends Controller
{
    public function index()
    {
        $charities = Charity::latest()->get();

        return CharityResource::collection($charities);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $charity = Charity::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Charity Created Successfully',
            'data' => new CharityResource($charity)
        ]);
    }

    public function show(Charity $charity)
    {
        return response()->json([
            'data' => new CharityResource($charity)
        ]);
    }

    public function update(Request $request, Charity $charity)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $charity->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Charity Edited Successfully',
            'data' => new CharityResource($charity)
        ]);
    }

    public function destroy(Charity $charity)
    {
        $charity->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Charity Deleted Successfully'
        ]);
    }
}
