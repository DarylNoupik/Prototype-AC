<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
         
            'name' => 'required|string|max:255',
            'email' => 'nullable|string',
            'role'=> 'nullable|string',
            'password'=> ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request->all());

        $missingFields = [];
        foreach ($validatedData as $key => $value) {
            if ($value === null) {
                $missingFields[] = $key;
            }
        }

        if (!empty($missingFields)) {
            session()->flash('warning', 'Attention : Les champs suivants sont manquants ou vides : ' . implode(', ', $missingFields));
        }

            User::create([

                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'utilisateur ajoutée avec succès!');

    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Équipe supprimée']);
    }
        // Modifier le type d'un compte utilisateur
    public function setRole(Request $request)
    {
        
        $userConcerned = User::find(Auth::id());
        $userConcerned->role = $request->role;
        $userConcerned->save();

        return back()->with('info', 'Type de rôle du compte utilisateur "'.$userConcerned->name.'" modifié avec succès');
    }
}