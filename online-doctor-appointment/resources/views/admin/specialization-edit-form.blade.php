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
                <div class="container mt-5" id="beforebulkdiv">
                    @if (session('success'))
                        <div class="flash-success">
                           
                        </div>
                    @endif
            
                    @if (session()->has('error'))
                        <div class="container alert alert-warning alert-dismissible fade show mt-3">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
            
                    <section>        
                        <div class="container mt-4 pt-4">
                            <div class="row">
                                <div class="col-12 col-sm-8 col-md-10 m-auto">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white">
                                            <div class="d-block m-auto text-uppercase text-center fs-4 fw-bold"> Update Specialization</div>
                                        </div>
                                        @isset($message)
                                            <h6 class="text-success text-center">{{ $message }}</h6>
                                        @endisset
            
                                        <div class="card-body mx-3">
                                            <form action="{{route('update',$edit->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                                
                                                <label class="text-muted"> Specialization</label>
                                                <input type="text" name="title" class="form-control" value="{{$edit->title}}"/>
                                                @error('title')
                                                   <h6 class="text-danger"> {{$message}} </h6> 
                                                @enderror
            
                                                <div class="text-left mt-3 border-1">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                    <a href="{{url('view-specialization')}}" class="btn btn-primary">Go Back</a>
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