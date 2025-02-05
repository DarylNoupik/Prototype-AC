<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::all();
        return view('sites.index',compact('sites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return Site::create($request->all());
    }

    public function show(Site $site)
    {
        return $site;
    }

    public function update(Request $request, Site $site)
    {
        $site->update($request->all());
        return $site;
    }

    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json(['message' => 'Site supprimé']);
    }
}
