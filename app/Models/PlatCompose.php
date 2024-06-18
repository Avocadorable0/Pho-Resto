<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatCompose extends Model
{
    use HasFactory;
    protected $table = 'plats_compose';
    protected $fillable =['platComposeNom','platComposeImg'];
}
