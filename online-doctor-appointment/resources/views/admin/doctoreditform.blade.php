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
        <div class="">
            @include('header')
             <!-- start: Content -->
                <!-- wrapper div starts from here -->
                <div class="container mt-5" id="beforebulkdiv">
                    @if (session('success'))
                        <div class="flash-success">
                           
                        </div>
                    @endif  
                    <section>        
                        <div class="container mt-0 pt-0">
                            <div class="row">
                                <div class="col-12 col-sm-8 col-md-10 m-auto">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white">
                                            <div class="d-block m-auto text-uppercase text-center fs-4 fw-bold"> Update Details</div>
                                        </div>
                                        @isset($message)
                                            <h6 class="text-success text-center">{{ $message }}</h6>
                                        @endisset

                                        @if(session('error'))
                                        <h6 class="text-danger text-center">{{ session('error') }}</h6>
                                        @endif
            
                                        <div class="card-body mx-3">
                                            <form action="{{route('doctorupdate',$edit->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                @error('name')
                                                   <h6 class="text-danger"> {{$message}} </h6> 
                                                @enderror
                                                <label class="text-muted"> Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$edit->name}}"/>
            
                                                @error('email')
                                                   <h6 class="text-danger"> {{$message}} </h6> 
                                                @enderror
                                                <label class="text-muted"> Email</label>
                                                <input type="text" name="email" class="form-control" value="{{$edit->email}}"/>
            
                                                @error('phone')
                                                   <h6 class="text-danger"> {{$message}} </h6> 
                                                @enderror
                                                <label class="text-muted"> Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{$edit->phone}}"/>
            
                                                @error('address')
                                                   <h6 class="text-danger"> {{$message}} </h6> 
                                                @enderror
                                                <label class="text-muted"> Address</label>
                                                <input type="text" name="address" class="form-control" value="{{$edit->address}}"/>

                                                <label class="text-muted"> Age</label>
                                                <input type="text" name="age" class="form-control" value="{{$edit->age}}"/>

                                                <select name="day" id="day" class="form-control my-2 py-2">
                                                    <option value="{{$edit->day}}"> {{$edit->day}}</option>
                                                    <option value="Sunday">Sunday</option>   
                                                    <option value="Monday">Monday</option>   
                                                    <option value="TuesDay">TuesDay</option>   
                                                    <option value="Wednesday">Wednesday</option>   
                                                    <option value="Thursday">Thursday</option>   
                                                    <option value="Friday">Friday</option>   
                                                    <option value="Saturday">Saturday</option>   
                                                </select>            

                                                <label class="text-muted"> Time From</label>
                                                <input type="time" name="time" class="form-control" value="{{$edit->time}}"/>

                                                <label class="text-muted"> Time To</label>
                                                <input type="time" name="totime" class="form-control" value="{{$edit->totime}}"/>

                                                <label class="text-muted"> Fees</label>
                                                <input type="text" name="fees" class="form-control" value="{{$edit->fees}}"/>

                                               <label class="text-muted"> Image</label>
                                               <input type="file" name="image" id="image" class="form-control"/>
            
                                                <div class="text-left mt-3 border-1">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                    <a href="{{route('view-doctor')}}" class="btn btn-primary">Go Back</a>
                                                </div>
                                            </form>                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                  </section>
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