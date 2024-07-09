<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ingredient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class IngredientController extends Controller
{
    public function storeIngredient(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ingredientNom' => 'required|string',
            'ingredientImg' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
            'ingredientPrixGramme' => 'required|numeric',
            'ingredientCalorieGramme' => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect('addIngredient')->withErrors($validator);
        }
    
        $path = $request->file('ingredientImg')->store('public/img/ingredients');
    
        $fileName = basename($path);
    
        $ingredient = new Ingredient();
        $ingredient->ingredientNom = $request->ingredientNom;
        $ingredient->ingredientImg = $fileName;
        $ingredient->ingredientPrixGramme = $request->ingredientPrixGramme;
        $ingredient->ingredientCalorieGramme = $request->ingredientCalorieGramme;
        $ingredient->save();
    
        return redirect()->route('ingredient');
    }

    public function toIngredientDetail($id,$title,$description){
        $ingredient = Ingredient::find($id);
        return view('detailIngredient',['title'=>$title,'desc'=>$description,'ingredient'=>$ingredient]);
    }

    public function toIngredientEdit($id,$title,$description){
        $ingredient = Ingredient::findOrFail($id);
        return view('editIngredient',['title'=>$title,'desc'=>$description,'ingredient'=>$ingredient]);
    }

    public function updateIngredient(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'ingredientNom' => 'required|string',
            'ingredientImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredientPrixGramme' => 'required|numeric',
            'ingredientCalorieGramme' => 'required|numeric',
        ]);

        if($validator->fails()){
            return redirect('editIngredient')->withErrors($validator);
        }
        $ingredient = Ingredient::findOrFail($id);
        if ($request->hasFile('ingredientImg')) {
            $path = $request->file('ingredientImg')->store('public/img/ingredients');
            $fileName = basename($path);
            $ingredient->ingredientImg = $fileName;
        }
        $ingredient->ingredientNom = $request->ingredientNom;
        $ingredient->ingredientPrixGramme = $request->ingredientPrixGramme;
        $ingredient->ingredientCalorieGramme = $request->ingredientCalorieGramme;
        $ingredient->save();

        return redirect()->route('ingredient');
    }

    public function deleteIngredient($id){
        $ingredient = Ingredient::FindOrFail($id);
        $ingredient->delete();
        return redirect()->route('ingredient');
    }

    public function generatePdf($idIngredient){
        $ingredient = Ingredient::FindOrFail($idIngredient);
        if($ingredient){
            $data = ['title'=>'Detail ingredient: '.$ingredient->ingredientNom,
                    'img' =>  public_path('storage/img/ingredients/' . $ingredient->ingredientImg),
                    'prix'=>$ingredient->ingredientPrixGramme,
                    'cal' =>$ingredient->ingredientCalorieGramme,
                ];
        }
        $pdf = Pdf::loadView('pdf.detailIngredient',$data);
        return $pdf->download('test.pdf');
    }
    
}
