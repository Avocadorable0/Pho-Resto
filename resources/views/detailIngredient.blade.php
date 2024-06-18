@extends('layouts.app')
@section('content')
@if($ingredient)
<section class="py-5">
            <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
            <img class="card-img-top" src="/storage/img/ingredients/{{ $ingredient->ingredientImg }}" alt="..."style="max-width: 50%; height: 50%px;margin-left:20%" />
                <div class="form-group"  style="margin-bottom:25px;">
                    <h2>{{ $ingredient->ingredientNom }}</h2>
                    <p>Prix du gramme: {{ $ingredient->ingredientPrixGramme }} Ar<br>
                    Calorie par gramme: {{ $ingredient->ingredientCalorieGramme }} cal</p>
                </div>
                <a class="btn btn-outline-dark mt-auto" href="{{ route('editIngredient',['id'=>$ingredient->id]) }}">Modifier</a>
                <a class="btn btn-outline-success mt-auto" href="{{ route('downloadPdf',['id'=>$ingredient->id]) }}">Pdf</a>
                <a class="btn btn-outline-danger mt-auto" href=" {{ route('deleteIngredient',['id'=>$ingredient->id]) }}">Supprimer</a>
            </div>
</section>
@else
<p>Tsisy ltie tsisy</p>
@endif
@endsection