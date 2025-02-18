<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $sites = Site::all();
        $query = $request->input('query');

    
        if ($query) {
            $sites = Site::where('name', 'LIKE', "%{$query}%")
                ->orWhere('pays', 'LIKE', "%{$query}%")
                ->orWhere('region', 'LIKE', "%{$query}%")
                ->orWhere('ville', 'LIKE', "%{$query}%")
                ->paginate(10);
        } else {
            $sites = Site::paginate(10);
        }
        return view('sites.index',compact('sites','query'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pays' => 'nullable|string',
            'region'=> 'nullable|string',
            'ville'=> 'nullable|string',
            'Temp_moy'=>'nullable|numeric',
        ]);

        $missingFields = [];
        foreach ($validatedData as $key => $value) {
            if ($value === null) {
                $missingFields[] = $key;
            }
        }
        if (!empty($missingFields)) {
            session()->flash('warning', 'Attention : Les champs suivants sont manquants ou vides : ' . implode(', ', $missingFields));
        }

            Site::create($request->only([
                'name', 'pays', 'region', 'ville', 'Temp_moy'
            ]));
            return redirect()->back()->with('success', 'Site ajoutée avec succès!');
    }

    public function show(Site $site)
    {
        return $site;
    }

    public function update(Request $request, Site $site)
    {
        $site->update($request->all());
        return redirect()->back()->with('success', 'Site '.$site->name.' mise à jour avec succès!');
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->back()->with('success', 'site supprimée  avec succès!');
    }
}
