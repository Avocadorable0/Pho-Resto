<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu_PlatCompose;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Validator;

class MenuPlatComposeController extends Controller
{
    public function storeMenuPlatCompose(Request $req){
        $validator = Validator::make($req->all(),[
            'menuNom'=>'required|string',
            'menuDate'=>'required|date',
            'platCompose.*'=>'required|exists:plats_compose,id',
        ]);

        if($validator->fails()){
            return redirect('addMenu')->withErrors();
        }
        $platComp = $req->input('platCompose');
        $menu = new MenuController();
        $menuId = $menu->storeMenu($req);
        if($platComp !==null){
            foreach($platComp as $pc){
                $menuPlatComp = new Menu_PlatCompose();
                $menuPlatComp->menuId = $menuId;
                $menuPlatComp->platComposeId=$pc;
                $menuPlatComp->save();
            }
            return $menuId;
        }else{
            return $menuId;
        }
    }
}
