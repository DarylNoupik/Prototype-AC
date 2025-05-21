<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    /**
     * Get all sensor data for a specific site, sorted by creation date.
     */
    public function getBySite($siteId): JsonResponse
    {
        // Validate that the site exists
        $site = Site::find($siteId);
        if (!$site) {
            return response()->json(['error' => 'Site not found'], 404);
        }

        // Retrieve data for the site, sorted by created_at (descending)
        $data = SensorData::where('site_id', $siteId)
            ->with('site')
            ->orderBy('created_at', 'desc')
            ->paginate(20); // Paginate to avoid overloading

        return response()->json($data);
    }

    /**
     * Get the latest sensor data, optionally filtered by site.
     */
    public function getLatest($siteId = null): JsonResponse
    {
        $query = SensorData::query()->with('site')->orderBy('created_at', 'desc');

        if ($siteId) {
            // Validate that the site exists
            $site = Site::find($siteId);
            if (!$site) {
                return response()->json(['error' => 'Site not found'], 404);
            }
            $query->where('site_id', $siteId);
        }

        $latest = $query->first();

        if (!$latest) {
            return response()->json(['error' => 'No data found'], 404);
        }

        return response()->json($latest);
    }

    /**
     * Display a listing of all sensor data.
     */
    public function index(): JsonResponse
    {
        $data = SensorData::with('site')->paginate(20);
        return response()->json($data);
    }

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
            'site_id' => 'required|exists:sites,id',
        ]);

        $data = SensorData::create($validated);
        return response()->json($data, 201);
    }

    /**
     * Display the specified sensor data.
     */
    public function show(SensorData $data): JsonResponse
    {
        $data->load('site');
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
            'site_id' => 'exists:sites,id',
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
