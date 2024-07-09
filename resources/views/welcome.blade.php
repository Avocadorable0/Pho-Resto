@extends('layouts.app')
@section('content')
        
<!-- Section Plat(s) simple -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4">Plat(s) simple</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($plats as $plt)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <picture>
                        <source srcset="/storage/img/plats/{{$plt->platImg}}" type="image/webp">
                        <source srcset="/storage/img/plats/{{$plt->platImg}}" type="image/jpeg">
                        <img class="card-img-top" src="/storage/img/plats/{{$plt->platImg}}" alt="{{$plt->platNom}}" width="496" height="300" loading="eager">
                    </picture>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h2 class="fw-bolder">{{ $plt->platNom }}</h2>
                            <!-- Product price-->
                            {{ number_format($plt->totalprix,2,',',' ') }} Ar
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('detailPlat',['id'=>$plt->id]) }}">View details</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<hr>
<!-- Section Plat(s) composé -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4">Plat(s) composé</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($platCompose as $plts)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="/storage/img/platCompose/{{ $plts->platComposeImg }}" alt="{{ $plts->platComposeNom }}" width="496" height="300" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h2 class="fw-bolder">{{ $plts->platComposeNom }}</h2>
                            <!-- Product price-->
                            {{ number_format($plts->prixplatcompose,2,',',' ') }} Ar
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('detailPlatCompose',['id'=>$plts->id]) }}">View details</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</section>
@endsection
