<?php
namespace App\Http\Controllers;

use App\Models\RetourUtilisateur;
use App\Models\Recette;
use Illuminate\Http\Request;

class RetourController extends Controller
{
    public function store(Request $request, $recetteId)
    {
        // اعتبارسنجی داده‌ها
        $request->validate([
            'commentaire' => 'required',
            'note' => 'required|integer|min:1|max:5',
        ]);

        // ذخیره اطلاعات در دیتابیس
        $retour = RetourUtilisateur::create([
            'recette_id' => $recetteId,
            'commentaire' => $request->commentaire,
            'note' => $request->note,
        ]);

        // دریافت اطلاعات غذا
        $recette = Recette::findOrFail($recetteId);

        // ارسال داده‌ها به ویو
        return view('recette.show', [
            'recette' => $recette,
            'commentaire' => $retour->commentaire,
            'note' => $retour->note
        ])->with('success', 'Merci pour votre retour!');
    }
}
