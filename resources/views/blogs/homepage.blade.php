@extends ('layout.console')

@section ('content')

<section class="homepage">
        <h1 class="welcome">Welcome to {{$user->firstName}}'s Travelverse<i class="fa-solid fa-cart-flatbed-suitcase"></i>! </h1>
        @foreach ($blogs as $blog)
                <a href="/blogs/page/{{$blog->id}}"><h1 class="title">{{$blog->title}}</h1></a> 
                <p>{{$blog->created_at->format('M j, Y')}}</p>
        <hr>
        @endforeach

</section>

@endsection
