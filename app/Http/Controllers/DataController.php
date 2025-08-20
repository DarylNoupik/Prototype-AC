<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Models\Culture;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    /**
     * Get all sensor data for a specific site, sorted by creation date.
     */
    public function getByCulture($cultureId)
    {
        $data = SensorData::where('culture_id', $cultureId)
            ->latest()
            ->take(50)
            ->get();

        return response()->json(['data' => $data]);
    }

    public function getLatest($cultureId)
    {
        $data = SensorData::where('culture_id', $cultureId)
            ->latest()
            ->first();

        return response()->json($data ?: ['error' => 'Aucune donnée disponible']);
    }
    /**
     * Display a listing of all sensor data.
     */
    public function index(): JsonResponse
    {
        $data = SensorData::with('cultures')->paginate(20);
        return response()->json($data);
    }
    //cultures or culture i dont even know
    /**
     * Store a newly created sensor data in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'temperature' => 'required|numeric|between:-50,50',
            'luminosity' => 'required|numeric|min:0',
            'co2_level' => 'required|numeric|min:0',
            'soil_humidity' => 'required|numeric|between:0,100',
            'cultures_id' => 'required|exists:cultures,id',
        ]);

        $data = SensorData::create($validated);
        return response()->json($data, 201);
    }

    /**
     * Display the specified sensor data.
     */
    public function show(SensorData $data): JsonResponse
    {
        $data->load('cultures');
        return response()->json($data);
    }

    /**
     * Update the specified sensor data in storage.
     */
    public function update(Request $request, SensorData $data): JsonResponse
    {
        $validated = $request->validate([
            'temperature' => 'numeric|between:-50,50',
            'luminosity' => 'numeric|min:0',
            'co2_level' => 'numeric|min:0',
            'soil_humidity' => 'numeric|between:0,100',
            'cultures_id' => 'exists:cultures,id',
        ]);

        $data->update($validated);
        return response()->json($data);
    }

    /**
     * Remove the specified sensor data from storage.
     */
    public function destroy(SensorData $data): JsonResponse
    {
        $data->delete();
        return response()->json(null, 204);
    }
    
}
