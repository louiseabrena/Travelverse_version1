@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Register to Travelverse</h2>
    <div class="add">
    <a href="/login" class="w3-button w3-brown">Login</a>
    </div>

    <form method="post" action="/register" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" value="{{old('firstName')}}" required>
            
            @if ($errors->first('firstName'))
                <br>
                <span class="w3-text-red">{{$errors->first('firstName')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" value="{{old('lastName')}}" required>

            @if ($errors->first('lastName'))
                <br>
                <span class="w3-text-red">{{$errors->first('lastName')}}</span>
            @endif
        </div>

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
            <input type="password" name="password" id="password">

            @if ($errors->first('password'))
                <br>
                <span class="w3-text-red">{{$errors->first('password')}}</span>
            @endif
        </div>

            <button type="submit" class="w3-button w3-brown">Register</button>

    </form>

</section>

@endsection
