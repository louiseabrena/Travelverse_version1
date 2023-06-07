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

        <style type="text/css">
            .ck-editor__editable_inline{
                height: 300px;
            }
        </style>
        
    </head>
    <body>

        <header class="w3-padding">
            <a href="/" class="w3-text-brown"><h1>Travelverse</h1></a>
            @if (Auth::check())
                <a href="/">Home</a> |
                <a href="/console/blogs/homepage">Travelverse Page</a> |
                <a href="/console/blogs/list">Profile</a> |
                <a href="/console/logout">Log Out</a> 
            @else
                <a href="/">Home</a> |
                <a href="/console/register">Register</a> |
                <a href="/console/login">Login</a>
            @endif

        </header>

        <hr>

        @if (session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
            </div>
        @endif

        @yield ('content')

    </body>
</html>