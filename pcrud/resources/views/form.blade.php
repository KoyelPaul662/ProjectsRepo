<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @if (session()->has('success'))
        {{ session('success') }}
    @endif

    <!-- <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
 @csrf
<input type="text" name="name" placeholder="Enter Name"/>
<br><br>

<input type="text" name="email" placeholder="Enter email"/>
<br><br>

<input type="text" name="password" placeholder="Enter Password"/>
<br><br>
<input type="file" name="image" id="image" />
<br><br>
<button type="submit"> submit </button>
</form> -->

    <form action="">
        <input type="search" name="search" placeholder="Search here" value="{{ $search }}" />

        <button>Search </button>
        <a href="{{ url('/') }}"><button type="button">Reset </button></a>

    </form>


    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Enter Your Name:" value="{{ old('name') }}" />
        @error('name')
            {{ $message }}
        @enderror
        <br><br>

        <input type="text" name="email" placeholder="Enter Your email:" value="{{ old('email') }}" />
        @error('email')
            {{ $message }}
        @enderror
        <br><br>


        <input type="password" name="password" placeholder="Enter Your password:" />
        @error('password')
            {{ $message }}
        @enderror
        <br><br>

        <input type="password" name="password_confirmation" placeholder="Enter Your Confirm Password:" />
        @error('password_confirmation')
            {{ $message }}
        @enderror
        <br><br>

        <input type="file" name="image" id="image" />
        @error('image')
            {{ $message }}
        @enderror
        <br><br>

        <button type="submit"> Save</button>
    </form>
    <table>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Image</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>

        @foreach ($data as $datas)
            <tr>
                <td><input type="checkbox" value="{{$datas->id}}" class="slcheck" checked/> </td>
                <td>{{ $datas->name }}</td>
                <td>{{ $datas->email }}</td>
                <td>{{ $datas->password }}</td>
                <td><img src="images/{{ $datas->image }}" height="60px;" /></td>
                <td><a href="{{ route('edit', $datas->id) }}">Edit</a></td>
                <td><a href="{{ route('delete', $datas->id) }}">Delete</a></td>
            </tr>
        @endforeach

    </table>
    <a href="{{ url('login') }}">Log in</a>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.slcheck').click(function(){
                var val = $(this).val();
                $(this).prop('false');
                alert(val);
            })
           
        })

    </script>    

</body>

</html>
