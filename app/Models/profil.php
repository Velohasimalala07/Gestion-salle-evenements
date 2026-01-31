<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    Protected $table='profils';
    protected $fillable = [
        'nom',
        'prenom',
    ];
};
