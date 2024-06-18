<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatComposePlat extends Model
{
    use HasFactory;
    protected $table ='plats_compose_plat';
    public $incrementing =false;
    protected $fillable =['platComposeId','platId','quantite'];
}
