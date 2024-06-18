<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PlatCompose;
use App\Models\V_PlatCompose;
use App\Models\V_PlatComposition;
use App\Models\V_PlatCompositions;

use App\Http\Controllers\PlatComposePlatController;
use App\Http\Controllers\PlatComposeIngredientController;

class PlatComposeController extends Controller
{
    public function storePlatCompose(Request $req){
        $validator = Validator::make($req->all(),[
            'platComposeNom'=>'required|string',
            'platComposeImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validator->fails()){
            return redirect('addPlatCompose')->withErrors();
        }
        $path = $req->file('platComposeImg')->store('public/img/platCompose');
        $img = basename($path);
        $platCompose = new PlatCompose();
        $platCompose->platComposeNom = $req->platComposeNom;
        $platCompose->platComposeImg= $img;
        $platCompose->save();
        $id = $platCompose->id;
        return response()->json(['id'=>$id]);
    }

    public function toDetailPlatCompose($id,$title,$desc){
        $platCompose = V_PlatCompose::FindOrFail($id);
        $composition = V_PlatComposition::where('platComposeId', $id)->get();
        $compositions = V_PlatCompositions::where('platComposeId',$id)->get();
        return view('detailPlatCompose',['title'=>$title,'desc'=>$desc,'platCompose'=>$platCompose,'composition'=>$composition,'compositions'=>$compositions]);
    }

    public function toEditPlatCompose($id,$title,$desc){
        $platCompose = V_PlatCompose::FindOrFail($id);
        $composition = V_PlatComposition::where('platComposeId', $id)->get();
        $compositions = V_PlatCompositions::where('platComposeId',$id)->get();
        return view('editPlatCompose',['title'=>$title,'desc'=>$desc,'platCompose'=>$platCompose,'composition'=>$composition,'compositions'=>$compositions]);
    }

    public function updatePlatCompose(Request $req,$idPlatCompose){
        $validate = Validator::make($req->all(),[
            'platComposeNom' => 'required|string',
            'platComposeImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'platId.*'=>'required|exists:plats,id',
            'platQuant.*'=>'required|numeric',
            'ingredientId.*'=> 'required|exists:ingredients,id',
            'grammeIng.*'=>'required|numeric'
        ]);

        if($validate->fails()){
            return redirect('editPlatCompose/'.$idPlatCompose)->withErrors();
        }

        $platCompose = PlatCompose::FindOrFail($idPlatCompose);
        if($req->hasFile('platComposeImg')){
            $chem = $req->file('platComposeImg')->store('public/img/platCompose');
            $img= basename($chem);
            $platCompose->platComposeImg = $img;
        }
        $platCompose->platComposeNom = $req->platComposeNom;
        $platCompose->save();

        $platComposePlat = new PlatComposePlatController();
        $platComposePlat->updatePlatComposePlat($req,$idPlatCompose);

        $platComposeIngredient = new PlatComposeIngredientController($req,$idPlatCompose);
        $platComposeIngredient->updatePlatComposeIngredient($req,$idPlatCompose);

        return redirect()->route('welcome');
    }

    public function deletePlatCompose($idPlatCompose){
        $plt = new PlatComposeIngredientController();
        $plt->deletePlatComposeIngredient($idPlatCompose);

        $plat1 = new PlatComposePlatController();
        $plat1->deletePlatComposePlat($idPlatCompose);

        $plat2 = PlatCompose::where('id',$idPlatCompose)->delete();
        return redirect()->route('welcome');
    }
}
