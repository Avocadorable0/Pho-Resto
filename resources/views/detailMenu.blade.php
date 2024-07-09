@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
        <div class="form-group" style="margin-bottom:25px;">
            @if($menu)
                <h3>{{ $menu->menuNom }} du: {{$menu->menuDate}}</h3>    
            <h6>Liste des plats composés:</h6>
            <p>
            @foreach ($platComp as $mpc)
                &nbsp;&nbsp;&nbsp;- <a href="{{ route('detailPlatCompose',['id'=>$mpc->id]) }}">{{ $mpc->platComposeNom }}</a> - {{ number_format($mpc->calorietotal,2,',',' ') }} cal pour {{ number_format($mpc->prixplatcompose,2,',',' ')}} Ar <br>
            @endforeach
            </p>
            <h6>Liste des plats:</h6>
            @foreach($plat as $plt) 
                &nbsp;&nbsp;&nbsp;- <a href="{{ route('detailPlat',['id'=>$plt->id]) }}">{{ $plt->platNom }}</a> - {{ number_format($plt->totalcalorie,2,',',' ') }} cal pour {{ number_format($plt->totalprix,2,',',' ') }} Ar <br>
            @endforeach
        </div>
        <a class="btn btn-outline-dark mt-auto" href="{{route('editMenu',['id'=>$menu->id])}}">Modifier</a>
        <a class="btn btn-outline-danger mt-auto" href="{{route('deleteMenu',['id'=>$menu->id])}}">Supprimer</a>
        @endif
    </div>
</section>
@endsection
