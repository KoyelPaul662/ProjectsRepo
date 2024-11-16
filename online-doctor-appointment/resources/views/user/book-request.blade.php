<?php
use Illuminate\Support\Facades\Auth; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- start: Icons -->
       <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
       <!-- start: Icons -->
       <!-- start: CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
       <link rel="stylesheet" href="{{asset('/style.css')}}" />
       <!-- end: CSS -->
       <title>User</title>
</head>

<body>
    <style>       
        img {
          height: 30px;
          border-radius: 50%;
          margin: 3px;
        }
      </style>   
   @include('../sidebar/usersidebar')

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            @include('header')
             <!-- wrapper div starts from here -->
             <div class="container mt-3 pt-3">
                <div class="col-10 col-sm-8 col-md-12 m-auto">
                    <div class="card border-0 shadow py-2">
                        <div class="card-body mx-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="text-uppercase text-dark text-left fw-bold">Book Appointment:</h4>
                                <a href="#" class="btn btn-primary" onclick="goBack()">Go Back</a>
                            </div>
                            @if(session('success'))
                            <h6 class="text-center text-success">{{ session('success') }}</h6>
                            @endif                    
                            <form action="{{route('request')}}" method="post">
                              @csrf
                              <input type="hidden" class="form-control my-1 py-2" name="session" id="session" value="{{Auth::guard('user')->user()->id;}}" required readonly>

                              <input type="hidden" class="form-control my-1 py-2" name="email" id="session" value="{{Auth::guard('user')->user()->email;}}" required readonly>

                              <input type="hidden" class="form-control my-1 py-2" name="doctorid" id="doctorid" placeholder="Doctor Name" value="{{$doctorid->id}}" required readonly>
                          
                              <label for="">Doctor</label>
                              <input type="text" class="form-control my-1 py-2" name="doctorname" id="doctorname" placeholder="Doctor Name" value="{{$doctorid->name}}" required readonly>
                              @error('doctorname')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <label for="">Schedule Day</label>
                              <input type="text" class="form-control my-1 py-2" name="doctorday" id="doctorday" placeholder="Doctor day" value="{{$doctorid->day}}" required readonly>
                              @error('doctorday')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <label for="">Time From</label>
                              <input type="text" class="form-control my-1 py-2" name="doctortime" id="doctortime" placeholder="Doctor time" value="{{$doctorid->time}}" required readonly>
                              @error('doctortime')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <label for="">Time To</label>
                              <input type="text" class="form-control my-1 py-2" name="totime" id="totime" placeholder="Doctor time" value="{{$doctorid->totime}}" required readonly>
                              @error('totime')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <input type="text" class="form-control my-4 py-2" name="doctorfees" id="doctorfees" placeholder="Doctor time" value="{{$doctorid->fees}}" required readonly>
                              @error('doctorfees')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <input type="hidden" class="form-control my-4 py-2" name="specialization_id" id="specialization_id" placeholder="Doctor time" value="{{$doctorid->specialization_id}}" required readonly>
                              @error('specialization_id')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <input type="text" class="form-control my-4 py-2" name="name" id="name" placeholder="Your Name" value="{{old('name')}}" required>
                              @error('name')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror      
                                                                                              
                              <input type="text" class="form-control my-4 py-2" name="phone" id="phone" placeholder="Your Phone" value="{{old('phone')}}" required maxlength="10">
                              @error('phone')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <input type="text" class="form-control my-4 py-2" name="alternatephone" id="alternatephone" placeholder="Your Alternate Phone" value="{{old('phone')}}" required maxlength="10">
                              @error('alternatephone')
                                <h6 class="text-left text-danger">{{$message}} </h6>
                              @enderror

                              <input type="text" class="form-control my-4 py-2" name="age" id="age" placeholder="Your Age" value="{{old('age')}}" required >
                              @error('age')
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
                        </div> 
                    </div>
                </div>
            </div>
            <!-- wrapper div ends here -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('/script.js')}}"></script>
    <!-- end: JS -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>