<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu_Plat;
use App\Http\Controllers\MenuPlatComposeController;
use Illuminate\Support\Facades\Validator;

class MenuPlatController extends Controller
{
    public function storeMenuPlat(Request $req){
        $validator = Validator::make($req->all(),[
            'menuNom'=>'required|string',
            'menuDate'=>'required|date',
            'platCompose.*'=>'required|exists:plats_compose,id',
            'plat.*'=>'required|exists:plats,id',
        ]);

        if($validator->fails()){
            return redirect('addMenu')->withErrors();
        }

        $plats = $req->input('plat');
        $menuPlatComposeController = new MenuPlatComposeController();
        $idMenu = $menuPlatComposeController->storeMenuPlatCompose($req);
        
        if($idMenu !== null && $plats!==null){
            foreach($plats as $p){
                $menuPlat = new Menu_Plat();
                $menuPlat->menuId = $idMenu;
                $menuPlat->platId=$p;
                $menuPlat->save();
            }
            return redirect()->route('toMenu');
        }else{
            return redirect()->route('toMenu');
        }
    }
}
