<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ingredient;
use App\Models\Plat;
use App\Models\IngredientPlat;
use App\Models\PlatCompose;
use App\Models\V_PlatCompose;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;



class LinkController extends Controller
{
     public function toHome($title,$description){
        $v_ingredient_plat = DB::table('ingredients_plats_view')
        ->select('id', 'platNom', 'platImg','totalprix' )
        ->groupBy('id', 'platNom', 'platImg', 'totalprix')
        ->get();
        $platCompose =V_PlatCompose::all();
        return view('welcome', ['title'=>$title,'desc'=>$description,'plats'=>$v_ingredient_plat,'platCompose'=>$platCompose]);
    }

    public function toIngredient($title,$description){
        $ingredients=Ingredient::all();
        return view('/ingredient',['title'=>$title,'desc'=>$description,'ingredients'=>$ingredients]);
    }

    public function toAddIngredient($title,$description){
        return view('/addIngredient',['title'=>$title,'desc'=>$description]);
    }

    public function toAddPlat($title,$description){
        $ingredients=Ingredient::all();
        return view('/addPlat',['title'=>$title,'desc'=>$description,'ingredients'=>$ingredients]);
    }

    public function toPlatUpdate($id,$title,$description){
        $plat = Plat::FindOrFail($id);
        $descri =DB::table('ingredients_plats_view')->where('id',$id)->get();
        return view('/editPlat',['title'=>$title,'desc'=>$description,'plat'=>$plat,'ing'=>$descri]);
    }

    public function toAddPlatCompose($title,$description){
        $plats = Plat::all();
        $ingredients = Ingredient::all();
        return view('/addPlatCompose',['title'=>$title,'desc'=>$description,'plats'=>$plats,'ingredients'=>$ingredients]);
    }

    public function toMenu($title,$description){
        $menu = Menu::all();
        return view('/menu',['title'=>$title,'desc'=>$description,'menu'=>$menu]);
    }
    public function toAddMenu($title,$desc){
        $plat=Plat::all();
        $platComp =PlatCompose::all();
        return view('/addMenu',['title'=>$title,'desc'=>$desc,'plats'=>$plat,'platComp'=>$platComp]);
    }
}
