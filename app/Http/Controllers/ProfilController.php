<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function content()
    {
         return view ("bienvenue");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("formulaire");
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $stephanya=$request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',
        
        ]);
        profil::Create($stephanya);
        return view ('bienvenue');
        // $Profil = new Profil();
        // $Profil ->nom='Alice';
        // $Profil ->prenom='Marie';
        // $Profil ->save();

        // OR
        // Profil::create([
        // 'nom'=>'bob'
        // 'prenom'=>'marie'
    // ]);

    // OR

    // $validate=$request -> validate([
    //     'nom'=> 'required|string|max:255',
    //     'prenom'=>'required|string|max:255',
        
    // ]);


    }
         
    /**
     * Display the specified resource.
     */
    public function show(profil $profil)
    {
        $profil_ins = profil::all();
        return view('Profil_aff', compact("Profil_ins"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(profil $profil)
    // {
    //     //
    // }
   

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, profil $profil)
    // {
    //     //
    // }




    public function edit($id)
{
    $profil = Profil::findOrFail($id);
    return view('formulaire', compact('profil'));
}

public function update(Request $request, $id)
{
    $profil = Profil::findOrFail($id);

    $profil->nom = $request->nom;
    $profil->prenom = $request->prenom;
    $profil->save();

    return redirect()->route('profils.index')->with('success', 'Profil modifié avec succès');
}

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(profil $profil)
    // {
    //     //
    // }
    public function destroy($id)
{
    $profil = Profil::findOrFail($id);
    $profil->delete();

    return redirect()->route('profils.index')->with('success', 'Profil supprimé avec succès');
}


    public function index()
    {
        $profils = Profil::all();
        return view('Profil_aff', compact("profils"));
    }
}
