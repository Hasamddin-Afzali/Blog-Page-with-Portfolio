<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/aos.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/icon.png">
    <title>@yield('title', 'Hasamuddin.com')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('/img/logo.png')}}" alt="" style="width:150px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">HOME</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('blog') }}">BLOG</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('portfolio') }}">PORTFOLIO</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('contact') }}">CONTACT</a> </li>
            </ul>
        </div>
    </div>
</nav>