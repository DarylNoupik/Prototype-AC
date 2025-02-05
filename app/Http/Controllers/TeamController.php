<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return Team::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Team::create($request->all());
    }

    public function show(Team $team)
    {
        return $team;
    }

    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
        return $team;
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(['message' => 'Équipe supprimée']);
    }
}
