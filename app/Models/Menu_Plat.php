<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_Plat extends Model
{
    use HasFactory;
    protected $table='menu_plat';
    protected $primaryKey = 'platId';
    public $incrementing = false;
    protected $fillable =['menuId','platId'];
}
