<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\GeolocalisationService;
use Illuminate\Http\Request;


class ProjectController extends Controller
{


    protected GeolocalisationService $geolocalisationService;

    public function __construct(GeolocalisationService $geolocalisationService)
    {
        $this->geolocalisationService = $geolocalisationService;
    }

    public function search(string $query): JsonResponse
    {
        $result = $this->geolocalisationService->searchLocation(urlencode($query));
        return response()->json($result);
    }

    public function index()
    {
        $projects = Project::all();
        return view('projets.index',compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        return Project::create($request->all());
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return $project;
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Projet supprimé']);
    }
}
