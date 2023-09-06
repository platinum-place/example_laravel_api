<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Http\Resources\ResidentResource;
use App\Models\Resident;
use App\Services\ControllerService;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $residents = Resident::filter($request->all());
        return ResidentResource::collection($residents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResidentRequest $request)
    {
        $resident = Resident::create($request->all());
        return new ResidentResource($resident);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        return new ResidentResource($resident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResidentRequest $request, Resident $resident)
    {
        $resident->update($request->all());
        return new ResidentResource($resident);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();
        return response()->json(['message' => __('Resource deleted.')], 222);
    }
}
