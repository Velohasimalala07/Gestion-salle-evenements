<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $fillable = ['destination', 'duree', 'type_voyage', 'prix'];

}
