<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 @if(session()->has('invalidpass'))   

{{session('invalidpass')}}

@endif 

@if(session('error'))
    <p class="text-center text-danger">{{session('error')}}</p>
@endif

    <h1>Log In</h1>
    <form action="{{route('login')}}" method="post">
    @csrf
    <input type="text" name="email" id="email" placeholder="Enter your email"/>
    <br><br>
    <input type="password" name="password" id="password" placeholder="Enter password"/>
    <br><br>
    <button type="submit" > Log IN</button>

</form>
</body>
</html>