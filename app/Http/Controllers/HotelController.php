<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = hotel::all();
        return view('hotels', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'services_offerts' => 'required|integer',
            'types_chambres' => 'required',
            'prix' => 'required|numeric',
        ]);

        hotel::create($request->all());
        return redirect()->route('hotels.index')->with('success', 'hotel ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hotel $hotel)
    {
        $hotel = Hotel::findOrFail($id);
        $hotels = Hotel::all();
        return view('voyages', compact('voyages', 'voyage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hotel $hotel)
    {
        $request->validate([
            'nom' => 'required',
            'services_offerts' => 'required|integer',
            'types_chambres' => 'required',
            'prix' => 'required|numeric',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return redirect()->route('hotels.index')->with('success', 'hotel modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hotel $hotel)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel supprimé avec succès!');
    }
}
