<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Travelverse</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{url('app.css')}}">

        <script src="{{url('app.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
        <script src="https://kit.fontawesome.com/6f5b01924a.js" crossorigin="anonymous"></script>

        <style type="text/css">
            .ck-editor__editable_inline{
                height: 300px;
            }
        </style>
        
    </head>
    <body>

        <header>
        <div class="logo">
            <a href="/" class="w3-text-brown">travelverse<i class="fa-solid fa-cart-flatbed-suitcase"></i></a>
        </div>
        <div class="search">
            <form method="get" action="{{url('/blogs/search')}}" class="search" novalidate class="w3-margin-bottom">
                <input type="search" name="query" id="title" placeholder="Search Blogs">
                <button type="submit" class="w3-button w3-brown">Search</button>
            </form>
        </div>
        <div class="navigation">
            @if (Auth::check())
                <a href="/"><i class="fa-solid fa-location-dot"></i> HOME</a>
                <a href="/blogs/{{auth()->user()->id}}"><i class="fa-solid fa-cart-flatbed-suitcase"></i> TRAVELVERSE PAGE</a> 
                <a href="/blogs/{{auth()->user()->id}}/profile"><i class="fa-solid fa-user"></i> PROFILE</a> 
                <a href="/logout"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> LOG OUT</a> 
            @else
                <a href="/"><i class="fa-solid fa-location-dot"></i> HOME</a>
                <a href="/register"><i class="fas fa-id-card"></i> REGISTER</a> 
                <a href="/login"><i class="fa-solid fa-right-to-bracket"></i> LOGIN</a>
            @endif
        </div>

        </header>

        @if (session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
            </div>
        @endif

        @yield ('content')

        <footer>
        <p> &copy; 2023 Louise Abrena. All rights reserved. </p>
        </footer>

    </body>
</html>