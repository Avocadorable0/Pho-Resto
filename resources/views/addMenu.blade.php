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
            <form action="{{ route('storeMenuPlat') }}" method="post">
                @csrf
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nom du menu" name="menuNom">
                </div>
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" name="menuDate">
                </div>
                <label for="exampleInputEmail1">Les plats composés</label>
                @foreach ($platComp as $pc)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$pc->id}}" id="flexCheckDefault" name="platCompose[]">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$pc->platComposeNom}}
                    </label>
                </div>
                @endforeach
                <hr>
                <label for="exampleInputEmail1">Les plats</label>
                @foreach ($plats as $p)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$p->id}}" id="flexCheckDefault" name="plat[]">
                    <label class="form-check-label" for="flexCheckDefault">
                      {{$p->platNom}}
                    </label>
                </div>
                @endforeach
                <button style="margin-top: 2%" type="submit" class="btn btn-dark">Ajouter</button>
                </form>
                <div>
        </section>
@endsection