<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Salle;
use App\Models\Materiel;

class ReservationController extends Controller
{
    // 🔹 Liste des reservations (pour admin)
    public function index()
    {
        // Récupérer toutes les reservations avec salle et materiels
        $reservations = Reservation::with(['salle', 'materiels'])->get();
        return response()->json($reservations);
    }

    // 🔹 Créer une nouvelle reservation
    public function store(Request $request)
    {
        $request->validate([
            'date_reservation' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'salle_id' => 'required|exists:salles,id',
            'total' => 'required|integer',
        ]);

        // 🔹 Vérification double réservation
        $existing = Reservation::where('salle_id', $request->salle_id)
            ->where('date_reservation', $request->date_reservation)
            ->where(function($q) use ($request) {
                $q->whereBetween('heure_debut', [$request->heure_debut, $request->heure_fin])
                  ->orWhereBetween('heure_fin', [$request->heure_debut, $request->heure_fin])
                  ->orWhereRaw('? BETWEEN heure_debut AND heure_fin', [$request->heure_debut])
                  ->orWhereRaw('? BETWEEN heure_debut AND heure_fin', [$request->heure_fin]);
            })
            ->first();

        if ($existing) {
            return response()->json([
                'message' => 'Cette salle est déjà réservée à cette date et heure.'
            ], 409); // 409 = Conflict
        }

        // 🔹 Créer la réservation
        $reservation = Reservation::create([
            'date_reservation' => $request->date_reservation,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'salle_id' => $request->salle_id,
            'total' => $request->total,
        ]);

        // 🔹 Si materiels envoyés, lier à reservation
        if ($request->materiels && is_array($request->materiels)) {
            foreach ($request->materiels as $m) {
                $reservation->materiels()->attach($m['id'], ['qteChoisie' => $m['qteChoisie']]);
            }
        }

        return response()->json($reservation, 201);
    }
}
