<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\RetourController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/recette', [RecetteController::class, 'showRandomRecette'])->name('recette.random');
Route::post('/recette/{id}/retour', [RetourController::class, 'store']);
Route::get('/recette/{id}', [RecetteController::class, 'show'])->name('recette.show');
