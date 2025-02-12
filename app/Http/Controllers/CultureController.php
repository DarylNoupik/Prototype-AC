<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    //Afficher la liste des cultures (vue index)
    public function index()
    {
        $cultures = Culture::all();
        return view('cultures.index', compact('cultures')); 
    }

   // Enregistrer une nouvelle culture
   public function store(Request $request)
   {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            //'phase' => 'required|string|max:255',
            //'site_id' => 'required|exists:sites,id',
            'temp_min' => 'nullable|numeric',
            'temp_max' => 'nullable|numeric',
            'tco2_min' => 'nullable|numeric',
            'tco2_max' => 'nullable|numeric',
            'vsh2o_min' => 'nullable|numeric',
            'vsh2o_max' => 'nullable|numeric',
        ]);

        // Vérification des champs manquants
        $missingFields = [];
        foreach ($validatedData as $key => $value) {
            if ($value === null) {
                $missingFields[] = $key;
            }
        }

        // Si des champs sont manquants, afficher un warning dans la session
        if (!empty($missingFields)) {
            session()->flash('warning', 'Attention : Les champs suivants sont manquants ou vides : ' . implode(', ', $missingFields));
        }

    //dd($request->all());
    
    // Création de la culture
    Culture::create($request->only([
        'name', 'temp_min', 'temp_max', 'tco2_min', 'tco2_max', 'vsh2o_min', 'vsh2o_max'
    ]));
    


    // Redirection avec message de confirmation
    return redirect()->back()->with('success', 'Culture ajoutée avec succès!');
   }

    public function show($id)
    {
        $culture = Culture::findOrFail($id);
        return response()->json($culture);
    }


     public function update(Request $request, Culture $culture)
     {
         $culture->update($request->all());
        // return redirect()->route('cultures.show', $culture->id); // Rediriger vers les détails de la culture
         return redirect()->back()->with('success', 'Culture ' .$culture->name.' modifiée avec succès!');
     }

    public function destroy(Culture $culture)
    {
        $culture->delete();
        return redirect()->back()->with('success', 'Culture supprimée  avec succès!');
    }
}
