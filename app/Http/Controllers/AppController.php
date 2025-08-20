<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Site;
use App\Models\Culture;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Affiche le dashboard.
     */
    public function dashboard()
    {
        // Charger les projets avec leurs sites, utilisateurs et cultures
        $projects = Project::with(['site', 'user', 'cultures'])->get();
        // Charger tous les sites et cultures pour les modals
        $sites = Site::all();
        $cultures = Culture::all();

        return view('dashboard', compact('projects', 'sites', 'cultures'));
    }
}
