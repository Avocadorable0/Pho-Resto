@extends('layouts.app')
@section('content')
@if($platCompose)
<section class="py-5">
    <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
        <img class="card-img-top" src="/storage/img/platCompose/{{ $platCompose->platComposeImg }}" alt="..." style="max-width: 50%; height: 50%px;margin-left:20%" />
        <div class="form-group" style="margin-bottom:25px;">
            <h2>{{ $platCompose->platComposeNom }}</h2>
            <p>Composé du/des plat(s):<br>
                @foreach($composition as $comp) 
                &nbsp;&nbsp;&nbsp;- <a href="{{ route('detailPlat',['id'=>$comp->platId]) }}">{{ $comp->platNom }}</a> - {{ $comp->quantite }} unité(s) <br>
                @endforeach
            </p>
            <p>Composé de/des ingredient(s)<br>
                @foreach($compositions as $comps) 
                &nbsp;&nbsp;&nbsp;- <a href="{{ route('detailIngredient',['id'=>$comps->ingredientId]) }}">{{ $comps->ingredientNom }}</a> - {{ $comps->ingredientGramme }} g <br>
                @endforeach
            </p>
            <p>
                Calorie du plat: {{ $platCompose->calorietotal }} cal <br>
                Prix du plat: {{ $platCompose->prixplatcompose }}.00 Ar
            </p>
        </div>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('editPlatCompose',['id'=>$platCompose->id]) }}">Modifier</a>
        <a class="btn btn-outline-danger mt-auto" href="{{ route('deletePlatCompose',['id'=>$platCompose->id]) }}">Supprimer</a>
    </div>
</section>
@else

@endif
@endsection
