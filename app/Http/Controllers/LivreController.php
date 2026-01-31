<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    // Affiche la liste des livres
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('livres.create');
    }

    // Enregistre un nouveau livre avec validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee_publication' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'nombre_exemplaires' => 'required|integer|min:1',
        ]);

        Livre::create($validated);
        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès !');
    }

    // Formulaire de modification
    public function edit(Livre $livre)
    {
        return view('livres.edit', compact('livre'));
    }

    // Met à jour un livre
    public function update(Request $request, Livre $livre)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee_publication' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'nombre_exemplaires' => 'required|integer|min:1',
        ]);

        $livre->update($validated);
        return redirect()->route('livres.index')->with('success', 'Livre modifié avec succès !');
    }

    // Supprime un livre
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès !');
    }
}

