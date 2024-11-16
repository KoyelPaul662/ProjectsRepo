
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('update',$edit->id)}}" method="post" enctype="multipart/form-data">
 @csrf   
<input type="text" name="name" placeholder="Enter Name" value="{{$edit->name}}"/>
<br><br>

<input type="text" name="email" placeholder="Enter email" value="{{$edit->email}}"/>
<br><br>

<input type="text" name="password" placeholder="Enter Password" value="{{$edit->password}}"/>
<br><br>
<input type="file" name="image" id="image" />
<br><br>
<button type="submit"> submit </button>
</form>
</body>
</html>