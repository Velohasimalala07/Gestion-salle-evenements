<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirmations = Confirmation::all();
        return view('confirmations.index', compact('confirmations'));
    }

    public function create()
    {
        return view('confirmations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'salle_nom'=>'required',
            'salle_capacite'=>'required',
            'salle_prix'=>'required',
            'date'=>'required',
            'heure_debut'=>'required',
            'heure_fin'=>'required',
            'total'=>'required',
        ]);

        Confirmation::create($request->all());
        return redirect()->route('confirmations.index')->with('success','Confirmation ajoutée');
    }

    public function edit($id)
    {
        $confirmation = Confirmation::findOrFail($id);
        return view('confirmations.edit', compact('confirmation'));
    }

    public function update(Request $request, $id)
    {
        $confirmation = Confirmation::findOrFail($id);
        $confirmation->update($request->all());

        return redirect()->route('confirmations.index')->with('success','Modification réussie');
    }

    public function destroy($id)
    {
        Confirmation::destroy($id);
        return redirect()->route('confirmations.index')->with('success','Supprimée');
    }
}

