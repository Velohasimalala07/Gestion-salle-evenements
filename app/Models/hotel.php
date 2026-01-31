<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $fillable = ['nom', 'services_offerts', 'types_chambres', 'prix'];
}

