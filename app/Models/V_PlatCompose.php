<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_PlatCompose extends Model
{
    use HasFactory;
    protected $table ='v_plat_compose';
    protected $fillable = ['id','platComposeNom','platComposeImg','calorietotal','prixplatcompose'];
}
