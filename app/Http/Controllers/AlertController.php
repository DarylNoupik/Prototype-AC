<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return view('alerts.index', compact('alerts')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string|max:255',
            'critical_data' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Alert::create($request->all());
        return redirect()->route('alerts.index');;
    }

    public function show(Alert $alert)
    {
        Alert::create($request->all());
        return redirect()->route('alerts.index');
    }

    public function update(Request $request, Alert $alert)
    {
        $alert->update($request->all());
        return redirect()->route('alerts.show', $alert->id);
    }

    public function destroy(Alert $alert)
    {
        $alert->delete();
        return response()->json(['message' => 'Alerte supprimée']);
    }
}
