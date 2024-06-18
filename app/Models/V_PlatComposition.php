<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_PlatComposition extends Model
{
    use HasFactory;
    protected $table='v_plat_composition';
    protected $fillable=['platComposeId','platId','platNom','quantite'];
}
