<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offre;

class OffreSeeder extends Seeder
{
    public function run(): void
    {
        Offre::create([
            'nom' => 'Salle Romantique',
            'capacite' => 150,
            'prix' => 800000,
            'description' => 'Salle climatisée, décor fleuri',
            'image' => 'romantique.jpg'
        ]);
    }
}
