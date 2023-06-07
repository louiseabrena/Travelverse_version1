@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<section class="w3-padding">
        
<section class="w3-padding w3-container">
    @foreach ($blogs as $blog)
                <h1>{{$blog->title}}</h1>
                <p>{!!$blog->content!!}</p>
                <p>{{$blog->user_lastName}}</p>
                <p>{{$blog->created_at->format('M j, Y')}}</p>
                <hr>
    @endforeach

</section>

@endsection
