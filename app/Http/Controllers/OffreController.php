<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    // Liste
    
    public function indexWeb()
    {
        $offres = Offre::all();
        return view('offres.index', compact('offres'));
    }

    // Page Create
    public function create()
    {
        return view('offres.create');
    }

    // Enregistrer Offre
    public function storeWeb(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'capacite' => 'required|integer',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offres', 'public');
        }

        Offre::create($data);

        return redirect()->route('offres.index')->with('success', 'Offre ajoutée avec succès!');
    }

    // Page Edit
    public function edit($id)
    {
        $offre = Offre::findOrFail($id);
        return view('offres.edit', compact('offre'));
    }

    // Update Offre
    public function updateWeb(Request $request, $id)
    {
        $offre = Offre::findOrFail($id);

        $data = $request->validate([
            'nom' => 'required|string',
            'capacite' => 'required|integer',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offres', 'public');
        }

        $offre->update($data);

        return redirect()->route('offres.index')->with('success', 'Offre modifiée avec succès!');
    }

    // Supprimer
    public function destroyWeb($id)
    {
        Offre::findOrFail($id)->delete();
        return redirect()->route('offres.index')->with('success', 'Offre supprimée avec succès!');
    }
    // Liste offres pour mobile / API
public function indexApi()
{
    $offres = Offre::all();
    return response()->json($offres);
}

}

