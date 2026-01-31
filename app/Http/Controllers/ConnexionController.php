<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConnexionController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nom_utilisateur' => 'required',
            'mot_de_passe' => 'required',
        ]);

        $user = Inscription::where('nom_utilisateur', $request->nom_utilisateur)->first();

        if ($user && Hash::check($request->mot_de_passe, $user->mot_de_passe)) {
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Nom d’utilisateur ou mot de passe incorrect'
        ], 401);
    }
}
