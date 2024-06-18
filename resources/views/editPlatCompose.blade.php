@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($platCompose)
<section class="py-5">
    <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
        <form action="{{ route('editerPlatCompose',['id'=>$platCompose->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="margin-bottom:25px;">
                <label for="exampleInputEmail1">Plat</label>
                <input type="text" class="form-control" placeholder="Nom initial: {{ $platCompose->platComposeNom }}" name="platComposeNom">
            </div>
            <div class="form-group" style="margin-bottom:25px;">
                <label for="ingredientImg">Image du plat</label>
                <input type="file" class="form-control" id="platImg" placeholder="Upload image" name="platComposeImg">
            </div>
            <div class="ingredient-container" style="margin-bottom:25px;">
                <label for="exampleInputEmail1">Quantité d'un/des plat(s)</label>
                @foreach($composition as $comp)
                <input type="hidden" value="{{ $comp->platId }}" name="platId[]"><br>
                <input type="number" class="form-control" id="platImg" placeholder="Ingredient {{ $comp->platNom }} - quantité: {{ $comp->quantite }} unité" name="platQuant[]">
                @endforeach
            </div>
            <div class="ingredient-container" style="margin-bottom:25px;">
                <label for="exampleInputEmail1">Quantité d'un/des ingredient(s)</label>
                @foreach($compositions as $comps)
                <input type="hidden" value="{{ $comps->ingredientId }}" name="ingredientId[]"><br>
                <input type="number" class="form-control" id="platImg" placeholder="Ingredient {{ $comps->ingredientNom }} - quantité: {{ $comps->ingredientGramme }} g" name="grammeIng[]">
                @endforeach
            </div>
            <button style="margin-top:5px; margin-left:90%" type="submit" class="btn btn-dark">Modifier</button>
        </form>
    </div>
</section>
@else
<p>tsisy ltie tsisy</p>
@endif
@endsection
