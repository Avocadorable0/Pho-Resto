<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;
use Illuminate\Support\Facades\Validator;

class PlatController extends Controller
{
    public function storePlat(Request $request){
        $validator = Validator::make($request->all(),[
            'platNom'=>'required|string',
            'platImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validator->fails()){
            return redirect('addPlat')->withErrors();
        }

        $path =$request->file('platImg')->store('public/img/plats');
        $img =basename($path);
        $plat = new Plat();
        $plat->platNom =$request->platNom;
        $plat->platImg =$img;
        $plat->save();
        return response()->json(['id'=>$plat->id]);
    }

    public function deletePlat($id){
        $plat = Plat::FindOrFail($id);
        $plat->delete();
    }

    public function updatePlat(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'platNom'=>'required|string',
            'platImg'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validator->fails()){
            return redirect('')->withErrors();
        }
        $plat = Plat::FindOrFail($id);
        if ($request->hasFile('platImg')) {
            $path = $request->file('platImg')->store('public/img/plats');
            $fileName = basename($path);
            $plat->platImg = $fileName;
        }
        $plat->platNom=$request->platNom;
        $plat->save();
    }
}
