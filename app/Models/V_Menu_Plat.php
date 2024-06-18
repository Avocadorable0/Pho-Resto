<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_Menu_Plat extends Model
{
    use HasFactory;
    protected $table='v_menu_plat';
    protected $fillable=['menuId','id','platNom','totalcalorie','totalprix'];
}
