@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Welcome back {{auth()->user()->firstName}} {{auth()->user()->lastName}}! </h2>
        <a href="/console/blogs/add" class="w3-button w3-brown">Add New Blog</a>
        <br>
        <br>
        @if ($blog->count()>0)
                @foreach ($blog as $blog)
                <a href="/console/blogs/edit/{{$blog->id}}" class="w3-button w3-brown">Edit Blog</a>
                <a href="/console/blogs/delete/{{$blog->id}}" class="w3-button w3-brown"">Delete Blog</a>
                        <h1>{{$blog->title}}</h1>
                        <p>{!!$blog->content!!}</p>
                        <p>{{$blog->created_at->format('M j, Y')}}</p>
                <br>
                @endforeach
        @endif
</section>

@endsection
