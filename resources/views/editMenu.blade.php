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
@if($menu)
<section class="py-5">
            <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
            <form action="{{ route('updateMenu',['id'=>$menu->id]) }}" method="post">
                @csrf
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Menu</label>
                    <input type="text" class="form-control" placeholder="Nom initial: {{ $menu->menuNom }}" name="menuNom">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="ingredientImg">Date</label>
                    <input type="date" class="form-control" id="platImg" placeholder="Date du menu" name="menuDate">
                </div>
                <h3>Liste des plats composés</h3>
                @foreach($platComp as $pc)
                    <p>- {{ $pc->platComposeNom }}&nbsp;&nbsp;&nbsp;<a href="{{route('deletePlat',['idPlat'=>$pc->id,'idMenu'=>$menu->id])}}">supprimer</a><br> 
                    </p>
                @endforeach
                <h3>Liste des plats</h3>
                @foreach($plat as $p)
                    <p>- {{ $p->platNom }}&nbsp;&nbsp;&nbsp;<a href="{{route('deletePlat',['idPlat'=>$p->id,'idMenu'=>$menu->id])}}">supprimer</a><br>
                    </p>
                @endforeach
                <h3>Ajouter des plats composés</h3>
                @foreach ($platCompose as $platcomp)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$platcomp->id}}" id="flexCheckDefault" name="platCompose[]">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$platcomp->platComposeNom}}
                    </label>
                </div>
                @endforeach
                <h3>Ajouter des plats</h3>
                @foreach ($plats as $plt)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$plt->id}}" id="flexCheckDefault" name="plats[]">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$plt->platNom}}
                    </label>
                </div>
                @endforeach
                <button style="margin-top:5px; margin-left:90%" type="submit" class="btn btn-dark">Modifier</button>
                </form>
            <div>
</section>
@else
<p>Tsisy ltie tsisy</p>
@endif
@endsection