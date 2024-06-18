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
            <form action="{{ route('storeIngredientPlat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"  style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Plat</label>
                    <input type="text" class="form-control" placeholder="Nom du plat" name="platNom">
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="ingredientImg">Image du plat</label>
                    <input type="file" class="form-control" id="platImg" placeholder="Upload image" name="platImg">
                </div>
                <div id="ingredients-container" style="border:1px solid black;padding:10px;border-radius:8px;">
                <div class="ingredient-container" style="margin-bottom:25px;">
                    <label for="exampleInputEmail1">Ingredient</label>
                    <select class="form-select" aria-label="Default select example" name="ingredient[]">
                        <option selected>Ajouter un ingredient</option>
                        @foreach($ingredients as $ing)
                        <option value="{{ $ing->id }}">{{ $ing->ingredientNom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:25px;">
                    <label for="exampleInputPassword1">Gramme de l'ingredient</label>
                    <input type="number" class="form-control" placeholder="Gramme de l'ingredient" name="gramme[]">
                </div>
                </div>
                <div style="margin-top:10px;">
                    <span id="add-ingredient" class="btn btn-dark">+</span>
                    <span id="remove-ingredient" class="btn btn-danger">-</span>
                </div>
                    <script>
                        document.getElementById('add-ingredient').addEventListener('click', function() {
                            var ingredientsContainer = document.getElementById('ingredients-container');
                            var ingredientContainer = ingredientsContainer.cloneNode(true);
                            ingredientsContainer.appendChild(ingredientContainer);
                        });

                        document.getElementById('remove-ingredient').addEventListener('click',function(){
                            var ingredientsContainer = document.getElementById('ingredients-container');
                            if (ingredientsContainer.children.length > 1) {
                            ingredientsContainer.removeChild(ingredientsContainer.lastChild);
                        }
                        });
                    </script>
                <button style="margin-top:5px; margin-left:90%" type="submit" class="btn btn-dark">Ajouter</button>
                </form>
                <div>
        </section>
@endsection