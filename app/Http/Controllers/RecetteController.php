<?php
namespace App\Http\Controllers;

use App\Repositories\RecetteRepository;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    protected $recetteRepository;

    public function __construct(RecetteRepository $recetteRepository)
    {
        // وابستگی به ریپازیتوری را تزریق می‌کنیم
        $this->recetteRepository = $recetteRepository;
    }

    public function showRandomRecette()
    {
        // دریافت یک recette تصادفی
        $recette = $this->recetteRepository->getRandomRecette();
        return view('recette.show', compact('recette'));
    }

    public function show($id)
    {
        // دریافت یک recette بر اساس شناسه
        $recette = $this->recetteRepository->getAllRecettes()->find($id);
        return view('recette.show', compact('recette'));
    }
}
