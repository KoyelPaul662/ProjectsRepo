<?php
use Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    @include('navbar')
        <div class="container mt-5 pt-5">
            <div class="col-10 col-sm-8 col-md-4 m-auto">
                <div class="card border-0 shadow py-4">
                    <div class="card-body mx-3">
                        <h4 class="text-uppercase text-dark text-center fw-bold"> Admin LogIn</h4>
                        @isset($errormsg)
                        <h6 class="text-center text-danger">{{ $errormsg }}</h6>
                        @endisset  
                        
                        @if(session('success'))
                        <h6 class="text-center text-success">{{session('success')}}</h6>
                        @endif  
                        <form action="#" method="post">
                            @csrf
                            <input type="email" class="form-control my-4 py-2" name="email" id="email" placeholder="Email" required>
                            <input type="password" class="form-control my-4 py-2" name="password" id="password" placeholder="Password" required>
                            <button type="submit" class="btn btn-primary w-100">Log In</button>
                        </form>
                        <div class="d-flex justify-content-between mt-2">   
                            <a href="#" class="text-decoration-none text-dark text-muted" >Forgot Password</a>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>