<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    // لیست ویژگی‌های قابل تخصیص دسته‌ای
    protected $fillable = [
        'name',
        'ingredients',
        'preparationTime',
        'cookingTime',
        'serves',
    ];
}
