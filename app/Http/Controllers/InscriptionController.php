<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nom_utilisateur' => '',
            'email' => '',
            'mot_de_passe' => '',
        ]);

        $user = Inscription::create([
            'nom_utilisateur' => $validated['nom_utilisateur'],
            'email' => $validated['email'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
        ]);

        return redirect()->back();
    }
}
