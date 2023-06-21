@extends ('layout.console')

@section ('content')

<section class="list">
    <h1 class="welcome">Welcome back {{auth()->user()->firstName}} {{auth()->user()->lastName}}<i class="fa-solid fa-cart-flatbed-suitcase"></i>! </h1>
        <div class="add">
                <a href="/blogs/add" class="w3-button w3-brown">Add New Blog</a>
        </div>
        <br>
        <br> 
        @foreach ($blogs as $blog)
        <div class="blogsInfo">
                <a href="/blogs/image/{{$blog->id}}" class="w3-button w3-brown">Add Image</a>
                <a href="/blogs/edit/{{$blog->id}}" class="w3-button w3-brown">Edit Blog</a>
                <a href="/blogs/delete/{{$blog->id}}" class="w3-button w3-brown"">Delete Blog</a>
        </div>
                        <h1 class="title">{{$blog->title}}</h1>
                        @if ($blog->image)
                        <div class="w3-container w3-margin-top">
                                <img src="{{asset('storage/'.$blog->image)}}" alt="photos related to blog post" width="200">
                        </div>
                        @endif
                        <p>{!!$blog->content!!}</p>
                        <p>{{$blog->created_at->format('M j, Y')}}</p>
        <hr>
        <div class="comments">
                @foreach ($comments as $comment)
                        <b><p>{{$comment->readerName}}</p></b>
                        <em><p>{{$comment->created_at->diffForHumans()}}</p></em>
                        <p>{{$comment->commentContent}}</p>
                @endforeach
        <hr>
        <hr>
        @endforeach

</section>

@endsection
