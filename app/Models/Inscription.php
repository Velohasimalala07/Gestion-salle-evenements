<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Inscription extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'inscriptions';   // 👉 AMPIO ITO

    protected $fillable = [
        'nom_utilisateur',
        'email',
        'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
