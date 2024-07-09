<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $fillable= ['id','ingredientNom','ingredientImg','ingredientPrixGramme','ingredientCalorieGramme'];

    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'plats__ingredients_plats',
                                                     'ingredientsPlatsId',
                                                     'ingredientsId')->withPivot('ingredientGramme');
    }
}
