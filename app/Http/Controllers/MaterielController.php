<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index()
    {
        $materiels = Materiel::all();
        return view('materiels.index', compact('materiels'));
    }

    public function create()
    {
        return view('materiels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|integer',
            'quantite' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('materiels', 'public');
        }

        Materiel::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'image' => $path
        ]);

        return redirect()->route('materiels.index')
            ->with('success', 'Matériel ajouté avec succès');
    }

    public function edit($id)
    {
        $materiel = Materiel::findOrFail($id);
        return view('materiels.edit', compact('materiel'));
    }

    public function update(Request $request, $id)
    {
        $materiel = Materiel::findOrFail($id);

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|integer',
            'quantite' => 'required|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = $materiel->image;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('materiels', 'public');
        }

        $materiel->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'image' => $path
        ]);

        return redirect()->route('materiels.index')
            ->with('success', 'Matériel modifié avec succès');
    }

    public function destroy($id)
    {
        $materiel = Materiel::findOrFail($id);
        $materiel->delete();

        return redirect()->route('materiels.index')
            ->with('success', 'Matériel supprimé');
    }
}
