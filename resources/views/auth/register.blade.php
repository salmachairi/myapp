
<!DOCTYPE html>
<html>

<head>
    <title>register</title>
</head>

<body>
    <div>
        <form action="{{route('register-user')}}" method="post" >
        @if(Session::has("success"))
        <div>{{Session::get('success')}}</div>
        @endif
        @if(Session::has("fail"))
        <div>{{Session::get('fail')}}</div>
        @endif
        @csrf
        <label>name:</label><br />
        <input type="text" placeholder="Name :" name="name" /><br />
        <span>@error("name") {{$message}} @enderror</span><br/>
        <label>Email:</label><br />
        <input type="email" placeholder="Email :" name="email" /><br />
        <span>@error("email") {{$message}} @enderror</span><br/>
        <label>Password:</label><br />
        <input type="password" placeholder="Password :" name="password" /><br />
        <span>@error("password") {{$message}} @enderror</span><br/>

        <button type="submit">Register</button>
</form>
    </div>
    <div>
        <a href="/login">did you have already an Account</a>
</body>

</html>
