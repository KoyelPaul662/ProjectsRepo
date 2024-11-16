<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    {{-- @include('navbar') --}}
    <div class="container mt-3 pt-3">
        <div class="col-10 col-sm-8 col-md-4 m-auto">
            <div class="card border-0 shadow py-4">
                <div class="card-body mx-3">
                    <h4 class="text-uppercase text-dark text-center fw-bold"> Resgistration</h4>
                    @if(session('success'))
                    <h6 class="text-center text-success">{{ session('success') }}</h6>
                    @endif                    
                    <form action="{{route('registration')}}" method="post">
                      @csrf
                      <input type="text" class="form-control my-4 py-2" name="name" id="name" placeholder="Name" value="{{old('name')}}" required>
                      @error('name')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror

                      <input type="text" class="form-control my-4 py-2" name="address" id="address" placeholder="Address" value="{{old('address')}}" required>
                      @error('address')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror

                      <input type="email" class="form-control my-4 py-2" name="email" id="email" placeholder="Email" value="{{old('email')}}" required>
                      @error('email')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror

                      <input type="text" class="form-control my-4 py-2" name="phone" id="email" placeholder="Phone" value="{{old('phone')}}" required maxlength="10">
                      @error('phone')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror
                      
                      <input type="password" class="form-control my-4 py-2" name="password" id="password" placeholder="Password" required>
                      @error('password')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror

                      <input type="password" class="form-control my-4 py-2" name="password_confirmation" placeholder="Confirmed Password" required>
                      @error('password_confirmation')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror

                      <div class="d-flex">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1male" value="M"  checked>
                            <label class="form-check-label" for="gender1male">
                              Male
                            </label>
                          </div>
                          <div class="form-check ">
                            <input class="form-check-input" type="radio" name="gender" id="gender1female" value="F" >
                            <label class="form-check-label" for="gender1female">
                              Female
                            </label>
                          </div>
                      </div>
                      @error('gender')
                      <h6 class="text-left text-danger">{{$message}} </h6>
                      @enderror 
                      <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                    </form>
                    <p class="text-dark fw-bold mt-1 text-muted">Already have an account ?? <a href="{{url('/user-login')}}" class="text-decoration-none">Login</a></p>
                </div> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>