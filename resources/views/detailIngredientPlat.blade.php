@extends('layouts.app')
@section('content')
@if($ingredientPlat)
<section class="py-5">
    <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
        <img class="card-img-top" src="/storage/img/plats/{{ $ingredientPlat->platImg }}" alt="..." style="max-width: 50%; height: 50%px;margin-left:20%" />
        <div class="form-group" style="margin-bottom:25px;">
            <h2>{{ $ingredientPlat->platNom }}</h2>
            <p>Ingredients:<br>
                @foreach($ingredientPlatDetail as $ing) 
                &nbsp;&nbsp;&nbsp;<a href="{{ route('detailIngredient',['id'=>$ing->ingredientsId]) }}">{{ $ing->ingredientNom }}</a> - {{ $ing->quantite }} g <br>
                @endforeach
            Calorie du plat: {{ $ingredientPlat->totalcalorie }} cal <br>
            Prix du plat: {{ $ingredientPlat->totalprix }}.00 Ar
            </p>
        </div>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('editerPlat',['id'=>$ingredientPlat->id]) }}">Modifier</a>
        <a class="btn btn-outline-danger mt-auto" href="{{ route('deleteIngredientPlat',['id'=>$ingredientPlat->id]) }}">Supprimer</a>
    </div>
</section>
@else

@endif
@endsection
