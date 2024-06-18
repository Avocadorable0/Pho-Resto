<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_PlatCompose extends Model
{
    use HasFactory;
    protected $table ='menu_plat_compose';
    protected $primaryKey = 'platComposeId';
    public $incrementing = false;
    protected $fillable =['menuId','platComposeId'];
}
