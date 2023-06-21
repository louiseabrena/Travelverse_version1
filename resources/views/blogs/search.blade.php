@extends ('layout.console')

@section ('content')

<section class="searchPage">
        <h1 class="welcome">Results <i class="fa-solid fa-cart-flatbed-suitcase"></i>! </h1>
        <div class="add">
            <a href="/" class="w3-button w3-brown">Go back to Travelverse <i class="fa-solid fa-cart-flatbed-suitcase"></i>'s Home</a>
        </div> 
        @foreach ($blogs as $blog)
                <a href="/blogs/page/{{$blog->id}}"><h1 class="title">{{$blog->title}}</h1></a> 
                <p>{{$blog->created_at->format('M j, Y')}}</p>
        <hr>
        @endforeach
</section>

@endsection