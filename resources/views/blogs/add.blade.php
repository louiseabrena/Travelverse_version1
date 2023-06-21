@extends ('layout.console')

@section ('content')

<section class="w3-padding">
    <h2>Add New Blog</h2>
    <div class="add">
    <a href="/blogs/{{$user->id}}/profile" class="w3-button w3-brown">Back to Profile</a>
    </div>
    <br>

    <form method="post" action="/blogs/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="topic_id">Tag:</label>
            <select name="topic_id" id="topic_id">
                <option></option>
                @foreach ($topic as $topic)
                    <option value="{{$topic->id}}"
                        {{$topic->id == old('topic_id') ? 'selected' : ''}}>
                        {{$topic->tag}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('topic_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('topic_id')}}</span>
            @endif
        </div>
   
        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea type="text" name="content" id="content" rows="10" required>{{old('content')}}</textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif

        <script>

            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        </div>

        <button type="submit" class="w3-button w3-brown">Add Blog</button>

    </form>

</section>

@endsection