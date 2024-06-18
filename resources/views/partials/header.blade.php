<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hotel Kalalao - {{ $title }}</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
        <!-- Bootstrap icons-->
        <link href="/css/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/style.css" rel="stylesheet" />
    </head>
 <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('welcome') }}">Hotel Kalalao</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li  class="nav-item"><a class="nav-link" href="{{route('toMenu')}}">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ingredient') }}">Ingredients</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ajouter</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('addIngredient') }}">Ajouter un ingredient</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="{{ route('addPlat') }}">Ajouter un plat</a></li>
                                <li><a class="dropdown-item" href="{{ route('addPlatCompose') }}">Ajouter un plat composé</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a a class="dropdown-item" href="{{route('addMenu')}}">Ajouter un menu</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Hotel Kalalao</h1>
                    <p class="lead fw-normal text-white-50 mb-0">{{ $desc }}</p>
                </div>
            </div>
        </header>