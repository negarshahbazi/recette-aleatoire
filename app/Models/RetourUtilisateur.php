<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetourUtilisateur extends Model
{
    // سایر کدهای مدل

    protected $fillable = [
        'commentaire',
        'note',
        'recette_id',  // اضافه کردن recette_id به fillable
    ];
}
