@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Welcome to {{auth()->user()->firstName}} {{auth()->user()->lastName}} Travelverse! </h2>
        <br>
        <br>
        @foreach ($blog as $blog)
                <h1>{{$blog->title}}</h1>
                <p>{!!$blog->content!!}</p>
                <p>{{$blog->created_at->format('M j, Y')}}</p>
        <br>
        @endforeach
</section>

@endsection
