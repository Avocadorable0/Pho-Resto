<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $fillable =['id','platNom','platImg'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'plats__ingredients_plats','ingredientsPlatsId','ingredientsId')->withPivot('ingredientGramme');
    }
}
