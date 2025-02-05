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

     // Afficher le formulaire pour créer une nouvelle culture (vue create ou un autre que nom que tu veux)
     public function create()
     {
         return view('cultures.create'); // Afficher le formulaire de création de culture
     }

   // Enregistrer une nouvelle culture
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'phase' => 'required|string|max:255',
           'site_id' => 'required|exists:sites,id',
       ]);

       Culture::create($request->all());
       return redirect()->route('cultures.index'); // Rediriger vers la liste des cultures
   }

    public function show(Culture $culture)
    {
        return view('cultures.show', compact('culture')); // Afficher une culture spécifique
    }

     // Afficher le formulaire pour éditer une culture (vue edit)
     public function edit(Culture $culture)
     {
         return view('cultures.edit', compact('culture')); // Afficher le formulaire d'édition
     }
 

     public function update(Request $request, Culture $culture)
     {
         $culture->update($request->all());
         return redirect()->route('cultures.show', $culture->id); // Rediriger vers les détails de la culture
     }

    public function destroy(Culture $culture)
    {
        $culture->delete();
        return response()->json(['message' => 'Culture supprimée']);
    }
}
