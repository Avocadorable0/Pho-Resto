<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_PlatCompositions extends Model
{
    use HasFactory;
    protected $table='v_plat_compositions';
    protected $fillable =['platComposeId','ingredientId','ingredientNom','ingredientGramme'];
}
