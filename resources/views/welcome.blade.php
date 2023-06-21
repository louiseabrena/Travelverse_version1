@extends ('layout.console', ['title' => 'Home'])

@section ('content')

<section class="home">
        
<section class="w3-padding w3-container">
            <h1 class="welcome">Welcome to Travelverse<i class="fa-solid fa-cart-flatbed-suitcase"></i>!</h1>
            <br>
    @foreach ($blogs as $blog)
                <a href="/blogs/page/{{$blog->id}}"><h1 class="title">{{$blog->title}}</h1></a>  
                <h4>{{$blog->user->firstName}} {{$blog->user->lastName}}</h3>
                <p>{{$blog->created_at->format('M j, Y')}}</p>
    <hr>
    @endforeach
</section>

@endsection
