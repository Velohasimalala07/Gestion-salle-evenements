<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $fillable = [
        'salle_nom','salle_capacite','salle_prix',
        'materiels','date','heure_debut','heure_fin','total'
    ];
}
