<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Affiche le dashboard.
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
