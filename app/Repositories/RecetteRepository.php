<?php
namespace App\Repositories;

use App\Models\Recette;

class RecetteRepository
{
    public function getRandomRecette()
    {
        return Recette::inRandomOrder()->first(); // Recette aléatoire
    }

    public function getAllRecettes()
    {
        return Recette::all();
    }
}
