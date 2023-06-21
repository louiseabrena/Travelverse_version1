@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Login to your Travelverse</h2>
    <div class="add">
    <a href="/register" class="w3-button w3-brown">Register</a>
    </div>

    <form method="post" action="/login" novalidate>

        @csrf

        <div class="w3-margin-bottom">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required>
            
            
            @if ($errors->first('email'))
                <br>
                <span class="w3-text-red">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            @if ($errors->first('password'))
                <br>
                <span class="w3-text-red">{{$errors->first('password')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-brown">Log In</button>

    </form>

</section>

@endsection
        