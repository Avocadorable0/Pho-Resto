<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PlatComposePlatController;
use App\Models\PlatComposeIngredient;
use Illuminate\Support\Facades\Validator;

class PlatComposeIngredientController extends Controller
{
    public function strorePlatComposeIngredient(Request $req){
        $validator = Validator::make($req->all(),[
            'platComposeNom'=>'required|string',
            'platComposeImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plat.*' => 'required|exists:plats,id',
            'nbPlat.*'=>'required|numeric',
            'ing.*' => 'required|exists:ingredients,id',
            'grammeIng.*' => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect('addPlatCompose')->withErrors();
        }

        $platComposePlat = new PlatComposePlatController();
        $idPlatCompose = $platComposePlat->storePlatComposePlat($req);
        $ings = $req->input('ing');
        $grammeIng = $req->input('grammeIng');
        if($idPlatCompose !== null){
            foreach($ings as $i => $ing){
                $platComposeIngredient = new PlatComposeIngredient();
                $platComposeIngredient->platComposeId = $idPlatCompose;
                $platComposeIngredient->ingredientId = $ing;
                $platComposeIngredient->ingredientGramme = $grammeIng[$i];
                $platComposeIngredient->save();
            }
        }
        return redirect()->route('welcome');
    }

    public function updatePlatComposeIngredient(Request $req,$idPlatCompose){
        $validator = Validator::make($req->all(),[
            'ingredientId.*'=> 'required|exists:ingredients,id',
            'grammeIng.*'=>'required|numeric'
        ]);

        if($validator->fails()){
            return redirect('editPlatCompose/'.$idPlatCompose)->withErrors();
        }

        $ingredients = $req->input('ingredientId');
        $grammes = $req->input('grammeIng');

        foreach($ingredients as $i=>$ing){
            $platComposeIngredient = PlatComposeIngredient::where('platComposeId',$idPlatCompose)
                                                            ->where('ingredientId',$ing)
                                                            ->update(['ingredientGramme'=>$grammes[$i]]);
        }
    }

    public function deletePlatComposeIngredient($idPlatCompose){
        $platComposeIng = PlatComposeIngredient::where('platComposeId',$idPlatCompose)
                                                ->delete();
    }
}
