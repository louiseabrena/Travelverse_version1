@extends ('layout.console', ['title' => 'Home'])

@section ('content')

<section class="home">
        
<section class="w3-padding w3-container">
        <div class="add">
            <a href="/" class="w3-button w3-brown">Go back to Travelverse <i class="fa-solid fa-cart-flatbed-suitcase"></i>'s Home</a>
        </div>
            <br>
                <h1 class="title">{{$blog->title}}</h1>
                @if ($blog->image)
                        <div class="w3-container w3-margin-top">
                                <img src="{{asset('storage/'.$blog->image)}}" alt="photos related to blog post" width="200">
                        </div>
                @endif
                <h4>{{$blog->user->firstName}} {{$blog->user->lastName}}</h3>
                <p>{!!$blog->content!!}</p>
                <p>{{$blog->created_at->format('M j, Y')}}</p>
    <hr>
        <div class="comments">
        @foreach ($comments as $comment)
                <b><p>{{$comment->readerName}}</p></b>
                <em><p>{{$comment->created_at->diffForHumans() }}</p></em>
                <p>{{$comment->commentContent}}</p>
        @endforeach
        </div>
        <br>
    <h3>Add Comment</h3>
                <form method="post" action="/blogs/{{$blog->id}}" novalidate class="w3-margin-bottom">
                        @csrf
                <div class="w3-margin-bottom">
                        <label for="readerName">Name:</label>
                        <input type="text" name="readerName" id="readerName" required></input>
                        <br>
                </div>
                <div class="w3-margin-bottom">  
                        <label for="commentContent">Comment:</label>
                        <input type="text" name="commentContent" id="commentContent" required></input>
                        <br>
                </div>
                        <button type="submit" class="w3-button w3-brown">Add Comment</button>
                </form>
        <hr> 
        <hr>
</section>

@endsection
