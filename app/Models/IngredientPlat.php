<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientPlat extends Model
{
    protected $table = 'plats__ingredients_plats';
    public $incrementing = false;
    protected $fillable = ['ingredientsPlatsId', 'ingredientsId', 'ingredientGramme'];
}

