@extends ('layout.console')

@section ('content')

<section class="w3-padding">
    <h2>Add New Tag</h2>

    <form method="post" action="/blogs/tag" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag" value="{{old('tag')}}" required>
            
            @if ($errors->first('tag'))
                <br>
                <span class="w3-text-red">{{$errors->first('tag')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-brown">Add Tag</button>

    </form>

</section>

@endsection