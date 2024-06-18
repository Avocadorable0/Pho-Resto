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
@if($ingredient)
<section class="py-5">
            <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
            <form action="{{ route('editerIngredient',['id'=>$ingredient->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Ingredient</label>
                    <input type="text" class="form-control" placeholder="Nom initial: {{ $ingredient->ingredientNom }}" name="ingredientNom">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="ingredientImg">Image de l'ingredient</label>
                    <input type="file" class="form-control" id="platImg" placeholder="Upload image" name="ingredientImg">
                </div>
                <div class="ingredient-container" style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Prix du gramme de l'ingredient</label>
                    <input type="number" class="form-control" id="platImg" placeholder="Prix du gramme initial: {{ $ingredient->ingredientPrixGramme }} Ar" name="ingredientPrixGramme">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="exampleInputPassword1">Calorie par gramme de l'ingredient</label>
                    <input type="number" class="form-control" placeholder="Calorie par gramme initial: {{ $ingredient->ingredientCalorieGramme }} Cal" name="ingredientCalorieGramme">
                </div>
                <button style="margin-top:5px; margin-left:90%" type="submit" class="btn btn-dark">Modifier</button>
                </form>
            <div>
</section>
@else
<p>Tsisy ltie tsisy</p>
@endif
@endsection