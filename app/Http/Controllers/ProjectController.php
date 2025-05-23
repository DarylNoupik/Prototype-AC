<?php

namespace App\Http\Controllers;
use App\Models\{Project,Site,Culture};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{

    public function index()
    {
        $cultures= Culture::all();
        $sites = Site::all();
        $projects = Project::with(['site', 'user','cultures'])->paginate(5);

        foreach ($projects as $project) {
            foreach ($project->cultures as $culture) {
                $culture->latestSensorData = $culture->sensorData()->latest()->first();
            }
        }
        return view('projets.index',compact(['projects','sites','cultures']));
    }

    public function latestData()
    {
        $projects = Project::with('cultures.sensorData')->get();

        foreach ($projects as $project) {
            foreach ($project->cultures as $culture) {
                $culture->latestSensorData = $culture->sensorData()->latest()->first();
            }
        }

        // Ici on renvoie juste les cultures avec latestSensorData (optionnel: tu peux filtrer ou formater)
        $cultures = $projects->flatMap->cultures;

        return response()->json($cultures);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'site_id' => 'nullable|exists:sites,id',
            'culture_id' => 'nullable|exists:cultures,id', // Une seule culture
        ]);

        //dd($request->all());
    
        // Création du projet avec l'utilisateur connecté
        $project = Project::create([
            'name' => $validatedData['name'],
            'site_id' => $validatedData['site_id'] ?? null,
            'user_id' => Auth::id(), // Récupération de l'utilisateur connecté
        ]);
    
        // Attacher la culture si elle est fournie
        if ($request->filled('culture_id')) {
            $project->cultures()->attach($request->culture_id);
        }

    return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
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
        return redirect()->back()->with('success', 'projet supprimé  avec succès!');
    }

    public function attachCulture(Request $request, Project $project)
    {
        $request->validate([
            'culture_id' => 'required|exists:cultures,id',
        ]);

        $project->cultures()->attach($request->culture_id);
        return redirect()->route('projects.index');
    }
    // Détacher une culture d'un projet
    public function detachCulture($culture)

    {
        //dd($culture);
        DB::table('culture_projet')->where('id', $culture)->delete();
        return redirect()->route('projects.index');
    }
}
