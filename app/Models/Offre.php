<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $table = 'nos_offres';

    protected $fillable = [
        'nom',
        'capacite',
        'prix',
        'description',
        'image'
    ];
}
