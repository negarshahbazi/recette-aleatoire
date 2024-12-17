<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Recette;
use Illuminate\Support\Facades\Storage;

class ParseRecipes extends Command
{
    protected $signature = 'app:parse-recipes';
    protected $description = 'Parse a JSON file and insert recipes into the database';

    public function handle()
    {
        $path = storage_path('app/recipes.json'); // Le fichier se trouve dans storage/app
        $json = json_decode(file_get_contents($path), true);

        foreach ($json['recipes'] as $recipe) {
            Recette::create([
                'name' => $recipe['name'],
                'ingredients' => json_encode($recipe['ingredients']),
                'preparationTime' => $recipe['preparationTime'],
                'cookingTime' => $recipe['cookingTime'],
                'serves' => $recipe['serves'],
            ]);
        }

        $this->info('Recipes have been parsed and inserted successfully.');
    }
}
