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
        <!-- Section-->
        <section class="py-5">
            <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
            <form action="{{ route('storeIngredient') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Ingredient</label>
                    <input type="text" class="form-control" placeholder="Nom de l'ingredient" name="ingredientNom">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="ingredientImg">Image de l'ingredient</label>
                    <input type="file" class="form-control" id="ingredientImg" placeholder="Upload image" name="ingredientImg">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="exampleInputPassword1">Prix</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Prix de l'ingredient" name="ingredientPrixGramme">
                </div>
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Calorie/100 g</label>
                    <input type="text" class="form-control" placeholder="Calorie par 100 g" name="ingredientCalorieGramme">
                </div>
                <button type="submit" class="btn btn-dark">Ajouter</button>
                </form>
                <div>
        </section>
@endsection