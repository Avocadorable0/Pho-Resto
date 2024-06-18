<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .ingredient-img {
            max-width: 50%;
            height: auto;
            margin-left: 20%;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <img src="{{ $img }}" alt="Image de l'ingrédient" class="ingredient-img">
    <p>Prix du gramme : {{ $prix }} Ar</p>
    <p>Calorie par gramme : {{ $cal }} cal</p>
</body>
</html>
