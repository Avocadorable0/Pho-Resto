<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Menu;
use App\Models\Menu_Plat;
use App\Models\Menu_PlatCompose;
use App\Models\V_Menu_Plat;
use App\Models\V_Menu_Plat_Compose;
use App\Models\Plat;
use App\Models\PlatCompose;

class MenuController extends Controller
{
    public function storeMenu(Request $req){
        $validator = Validator::make($req->all(),[
            'menuNom'=>'required|string',
            'menuDate'=>'required|date',
        ]);
        if($validator->fails()){
            return redirect('addMenu')->withErrors();
        }
        $menu = new Menu();
        $menu->menuNom=$req->menuNom;
        $menu->menuDate=$req->menuDate;
        $menu->save();
        return $menu->id;
    }

    public function toDetailMenu($idMenu,$title,$desc){
        $menu = Menu::where('id',$idMenu)->first();
        $menu_plat_compose = V_Menu_Plat_Compose::where('menuId', $idMenu)->get();
        $menu_plat = V_Menu_Plat::where('menuId',$idMenu)->get();
        return view('detailMenu',['title'=>$title,'desc'=>$desc,'menu'=>$menu,'platComp'=>$menu_plat_compose,'plat'=>$menu_plat]);
    }

    public function toEditMenu($idMenu,$title,$desc){
        $menu = Menu::where('id', $idMenu)->first();
        $menu_plat_compose = V_Menu_Plat_Compose::where('menuId', $idMenu)->get();
        $menu_plat = V_Menu_Plat::where('menuId', $idMenu)->get();
        $idMenuPlat = V_Menu_Plat::where('menuId',$idMenu)->pluck('id');
        $tabIdMenuPlat = $idMenuPlat->toArray();
        $idMenuPlatComp = V_Menu_Plat_Compose::where('menuId',$idMenu)->pluck('id');
        $tabIdMenuPlatComp = $idMenuPlatComp->toArray();
        $plat = Plat::whereNotIn('id', $tabIdMenuPlat)->get();
        $platComp = PlatCompose::whereNotIn('id', $tabIdMenuPlatComp)->get();
        return view('editMenu',['title'=>$title,'desc'=>$desc,'menu'=>$menu,'platComp'=>$menu_plat_compose,'plat'=>$menu_plat,'platCompose'=>$platComp,'plats'=>$plat]);
    }

    public function deletePlat($idPlat,$idMenu){
        $plat = Menu_Plat::where('menuId',$idMenu)->where('platId',$idPlat)->first();
        if($plat !==null){
            $plat->delete();
        }else{
            $platCompose = Menu_PlatCompose::where('menuId',$idMenu)->where('platComposeId',$idPlat)->first();
            if ($platCompose !== null) {
                $platCompose->delete();
            }
        }
        return redirect()->route('editMenu',['id'=>$idMenu]);
    }

    public function updateMenuPlat(Request $req, $idMenu) {
        $validator = Validator::make($req->all(),[
            'menuNom' => 'required|string',
            'menuDate' => 'required|date',
            'platCompose.*' => 'required|numeric',
            'plats.*' => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect('editMenu/'.$idMenu)->withErrors();
        }
        $menu = Menu::findOrFail($idMenu);
        $menu->menuNom = $req->menuNom;
        $menu->menuDate = $req->menuDate;
        $menu->save();
        if ($req->has('platCompose')) {
            foreach ($req->platCompose as $pc) {
                $menuPlatComp = new Menu_PlatCompose();
                $menuPlatComp->menuId = $idMenu;
                $menuPlatComp->platComposeId = $pc;
                $menuPlatComp->save();
            }
        }
        if ($req->has('plats')) {
            foreach ($req->plats as $plt) {
                $menu_plat = new Menu_Plat();
                $menu_plat->menuId = $idMenu;
                $menu_plat->platId = $plt;
                $menu_plat->save();
            }
        }
        return redirect()->route('toMenu');
    }

    public function deleteMenu($idMenu){
        $menu_plat_compose = Menu_PlatCompose::where('menuId',$idMenu)->delete();
        $menu_plat = Menu_Plat::where('menuId',$idMenu)->delete();
        $menu = Menu::where('id',$idMenu)->first();
        $menu->delete();
        return redirect()->route('toMenu');
    }
    
}
