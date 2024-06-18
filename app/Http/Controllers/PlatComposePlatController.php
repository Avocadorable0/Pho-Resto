<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlatComposePlat;
use App\Http\Controllers\PlatComposeController;
use Illuminate\Support\Facades\Validator;


class PlatComposePlatController extends Controller
{
    public function storePlatComposePlat(Request $req){
        $validator = Validator::make($req->all(),[
            'platComposeNom'=>'required|string',
            'platComposeImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plat.*' => 'required|exists:plats,id',
            'nbPlat.*'=>'required|numeric'
        ]);

        if($validator->fails()){
            return redirect('addPlatCompose')->withErrors();
        }
        $platCompose = new PlatComposeController();
        $idplat = $platCompose->storePlatCompose($req);
        $id = $idplat->original['id'];
        $plats = $req->input('plat');
        $nbPlat = $req->input('nbPlat');
        if($id !== null){
            foreach($plats as $i => $platId){
                $platComposePlat = new PlatComposePlat();
                $platComposePlat->platComposeId = $id;
                $platComposePlat->platId = $platId;
                $platComposePlat->quantite = $nbPlat[$i];
                $platComposePlat->save();
            }
        }
        return $id;
    }

    public function updatePlatComposePlat(Request $req,$idPlatCompose){
        $validator = Validator::make($req->all(),[
            'platId.*'=>'required|exists:plats,id',
            'platQuant.*'=>'required|numeric'
        ]);

        if($validator->fails()){
            return redirect('editPlatCompose/'.$idPlatCompose)->withErrors();
        }

        $plats = $req->input('platId');
        $quantites = $req->input('platQuant');

        foreach($plats as $i => $plat){
            $plt = PlatComposePlat::where('platComposeId',$idPlatCompose)
                                    ->where('platId',$plat)
                                    ->update(['quantite' => $quantites[$i]]);

        }
    }

    public function deletePlatComposePlat($idPlatCompose){
        $plat = PlatComposePlat::where('platComposeId',$idPlatCompose)->delete();
    }
}
