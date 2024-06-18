<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientPlat;
use App\Http\Controllers\PlatController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IngredientPlatController extends Controller
{
    public function storeIngredientPlat(Request $request)
    {
        $validate = Validator::make($request->all(),[
                'platNom'=>'required|string',
                'platImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'ingredient.*' => 'required|exists:ingredients,id',
                'gramme.*' => 'required|integer|min:1',
            ]);
            if($validate->fails()){
                return redirect('addPlat')->withErrors($validate);
            }
        $platController = new PlatController();
        $reponse = $platController->storePlat($request);
        $platId = null;
        if($reponse->getStatusCode()==200){
            $valeur =json_decode($reponse->getContent(),true);
            $platId = $valeur['id'];
        }
        if($platId !== null){
            $ingredients = $request->input('ingredient');
            $grammes = $request->input('gramme');
            foreach ($ingredients as $index => $ingredientId) {
                $ingredientPlat = new IngredientPlat();
                $ingredientPlat->ingredientsPlatsId = $platId;
                $ingredientPlat->ingredientsId = $ingredientId;
                $ingredientPlat->ingredientGramme = $grammes[$index];
                $ingredientPlat->save();
            }
        }
        return redirect()->route('welcome');
    }

    public function toIngredientPlatDetail($id,$title,$description){
        $v_ingredient_plat = DB::table('ingredients_plats_view')
        ->select('id', 'platNom', 'platImg','totalcalorie','totalprix' )
        ->where('id', $id)
        ->groupBy('id', 'platNom', 'platImg', 'totalcalorie','totalprix')
        ->first();

        $viewIngredientPlat = DB::table('ingredients_plats_view')
        ->select('ingredientsId','ingredientNom','quantite')
        ->where('id', $id)
        ->get();
        return view('detailIngredientPlat',['title'=>$title,'desc'=>$description,'ingredientPlat'=>$v_ingredient_plat,'ingredientPlatDetail'=>$viewIngredientPlat]);
    }

    public function deleteIngredientPlat($id){
        DB::table('plats__ingredients_plats')->where('ingredientsPlatsId',$id)->delete();
        $plat = new PlatController();
        $plat->deletePlat($id);
        return redirect()->route('welcome');
    }

    public function updateIngredientPlat(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'platNom'=> 'required|string',
            'platImg'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingId.*'=>'required|exists:ingredients,id',
            'grammeIng.*'=>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);

        if($validate->fails()){
           return redirect('/plat/edit/'.$id)->withErrors($validate);
        }
        $plat = new PlatController();
        $plat->updatePlat($request,$id);
        $ingredients = $request->input('ingId');
        $grammes = $request->input('grammeIng');
        foreach ($ingredients as $index => $ingredientId) {
            DB::table('plats__ingredients_plats')
                ->where('ingredientsId', $ingredientId)
                ->update(['ingredientGramme' => $grammes[$index]]);
        }
        return redirect()->route('welcome');
    }
    
}
