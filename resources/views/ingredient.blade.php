<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')
@section('content')        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($ingredients as $ing)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="/storage/img/ingredients/{{ $ing->ingredientImg }}" alt="{{ $ing->ingredientNom }}" width="300" height="200" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $ing->ingredientNom }}</h5>
                                    <!-- Product price-->
                                    {{ $ing->ingredientPrixGramme }} Ar
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('detailIngredient',['id'=>$ing->id]) }}">Voir details</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>
@endsection
