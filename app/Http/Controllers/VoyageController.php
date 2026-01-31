<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;

class VoyageController extends Controller
{
    public function index()
    {
        $voyages = Voyage::all();
        return view('voyages', compact('voyages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required',
            'duree' => 'required|integer',
            'type_voyage' => 'required',
            'prix' => 'required|numeric',
        ]);

        Voyage::create($request->all());
        return redirect()->route('voyages.index')->with('success', 'Voyage ajouté avec succès!');
    }

    public function edit($id)
    {
        $voyage = Voyage::findOrFail($id);
        $voyages = Voyage::all();
        return view('voyages', compact('voyages', 'voyage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required',
            'duree' => 'required|integer',
            'type_voyage' => 'required',
            'prix' => 'required|numeric',
        ]);

        $voyage = Voyage::findOrFail($id);
        $voyage->update($request->all());
        return redirect()->route('voyages.index')->with('success', 'Voyage modifié avec succès!');
    }

    public function destroy($id)
    {
        $voyage = Voyage::findOrFail($id);
        $voyage->delete();
        return redirect()->route('voyages.index')->with('success', 'Voyage supprimé avec succès!');
    }
}
