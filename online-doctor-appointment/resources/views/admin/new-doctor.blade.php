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

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
       <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
       <link rel="stylesheet" href="{{asset('/style.css')}}" />
       <!-- end: CSS -->
       <title>Admin</title>
</head>
<body>

  @include('../sidebar/sidebar')

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            @include('header')
             <!-- start: Content -->
                <!-- wrapper div starts from here -->
                <div class="container mt-3 pt-3">
                    <div class="col-10 col-sm-8 col-md-12 m-auto">
                        <div class="card border-0 shadow py-2">
                            <div class="card-body mx-3">
                                <h4 class="text-uppercase text-dark text-left fw-bold">  New Doctor:</h4>
                                @if(session('success'))
                                  <h6 class="text-center text-success">{{ session('success') }}</h6>
                                @endif                    
                                @if(session('error'))
                                  <h6 class="text-center text-danger">{{ session('error') }}</h6>
                                @endif                    
                                <form action="{{route('savedoctor')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="text" class="form-control my-4 py-2" name="name" id="name" placeholder="Doctor Name" value="{{old('name')}}" required>
                                  @error('name')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror
            
                                  <input type="text" class="form-control my-4 py-2" name="address" id="address" placeholder="Address" value="{{old('address')}}" required>
                                  @error('address')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror
                                     
                                  <select name="specialization_id" id="specialization_id" class="form-control my-4 py-2">
                                    <option value=""> Select Specialization</option>
                                       @foreach($data as $datas)
                                            <option value="{{$datas->id}}">{{$datas->title}}</option>
                                       @endforeach   
                                   </select>
                                   @error('specialization_id')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                   @enderror

                                   <select name="day" id="day" class="form-control my-4 py-2">
                                      <option value=""> Select Days</option>
                                      <option value="Sunday">Sunday</option>   
                                      <option value="Monday">Monday</option>   
                                      <option value="TuesDay">TuesDay</option>   
                                      <option value="Wednesday">Wednesday</option>   
                                      <option value="Thursday">Thursday</option>   
                                      <option value="Friday">Friday</option>   
                                      <option value="Saturday">Saturday</option>   
                                  </select>
                                  @error('day')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror

                                  <label for="">Time From</label> 
                                  <input type="time" class="form-control my-2 py-2" name="time" id="time" placeholder="Time" value="{{old('time')}}" required >
                                  @error('time')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror

                                  <label for="">Time To</label> 
                                  <input type="time" class="form-control my-2 py-2" name="totime" id="totime" placeholder="Time" value="{{old('totime')}}" required >
                                  @error('totime')
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

                                  <input type="text" class="form-control my-4 py-2" name="age" id="age" placeholder="Age" value="{{old('age')}}" required >
                                  @error('age')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror


                                  <input type="text" class="form-control my-4 py-2" name="fees" id="fees" placeholder="Fees" value="{{old('fees')}}" required >
                                  @error('fees')
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

                                  <input type="file" class="form-control my-4 py-2" name="image" id="image" placeholder="Image" required >
                                  @error('image')
                                    <h6 class="text-left text-danger">{{$message}} </h6>
                                  @enderror
                                  <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                                </form>                              
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- wrapper div ends here -->
              
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('/script.js')}}"></script>
    <!-- end: JS -->
</body>

</html>