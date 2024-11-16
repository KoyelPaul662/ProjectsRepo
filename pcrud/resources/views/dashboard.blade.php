
<?php
 use Illuminate\Support\Facades\Auth;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
</head>
<body>
         
<h1>Dashboard<h1>

<p> 
{{-- @if(session()->has('user'))
hiii {{session('user')->name}}
@endif --}}
@if(auth::guard('member')->check())
 {{auth::guard('member')->user()->name}}
@endif
</p>
<form action="{{url('logout')}}" method="post">
@csrf
<button type="submit" >Log out</button>
</form>
</body>
</html>

