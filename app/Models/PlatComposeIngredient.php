<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatComposeIngredient extends Model
{
    use HasFactory;
    protected $table ='plats_compose_ingredient';
    public $incrementing = false;
    protected $fillable = ['platComposeId','ingredientId','ingredientGramme'];
}
