@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Blog Image</h2>
    <div class="add">
    <a href="/blogs/{{$user->id}}/profile" class="w3-button w3-brown">Back to Profile</a>
    </div>
    <br>
    <br>

    <div class="w3-margin-bottom">
        @if($blog->image)
            <img src="{{asset('storage/'.$blog->image)}}" width="200">
        @endif
    </div>

    <form method="post" action="/blogs/image/{{$blog->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

        @csrf

        <div class="w3-margin-bottom">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}" required>
            
            @if ($errors->first('image'))
                <br>
                <span class="w3-text-red">{{$errors->first('image')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-brown">Add Image</button>

    </form>

</section>

@endsection
