<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'heure_debut',
        'heure_fin',
        'salle_id',
        'total'
    ];

    // Relation avec Salle
    public function salle() {
        return $this->belongsTo(Salle::class);
    }

    // Relation avec Materiels (many-to-many)
    public function materiels() {
        return $this->belongsToMany(Materiel::class)
                    ->withPivot('qteChoisie');
    }
}
