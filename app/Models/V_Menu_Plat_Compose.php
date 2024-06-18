<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_Menu_Plat_Compose extends Model
{
    use HasFactory;
    protected $table='v_menu_plat_compose';
    protected $fillable=['menuId','id','platComposeNom','calorietotal','prixplatcompose'];
}
