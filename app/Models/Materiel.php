<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $fillable = [
        'nom', 'description', 'prix', 'quantite', 'image'
    ];

    // Relation many-to-many avec Reservation
    public function reservations() {
        return $this->belongsToMany(Reservation::class)
                    ->withPivot('qteChoisie');
    }
}
