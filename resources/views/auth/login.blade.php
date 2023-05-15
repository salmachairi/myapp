<!DOCTYPE html>
<html>

<head>
    <title>login</title>
</head>

<body>
    <div>
        <form method="post" action="{{route('login-user')}}">
        @if(Session::has("success"))
        <div>{{Session::get('success')}}</div>
        @endif
        @if(Session::has("fail"))
        <div>{{Session::get('fail')}}</div>
        @endif
        @csrf
            <label for="email">Name or Email:</label><br />
            <input id="email" type="text" placeholder="Email :" name="email" value="{{old('email')}}" /><br />
        <span>@error("email") {{$message}} @enderror</span><br/>
            <label for="password">Password:</label><br />
            <input id="password" type="password" placeholder="Password" name="password" /><br />
        <span>@error("password") {{$message}} @enderror</span><br/>
            <button tybe=submit>Login</button>
        </form>
    </div>
    <div> 
        <a href="/register">creat an account</a>
    </div>
</body>

</html>