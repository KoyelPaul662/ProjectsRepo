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
                <!-- wrapper div starts from here -->
                <div class="container mt-3 pt-3">
                    <div class="col-10 col-sm-8 col-md-6 m-auto">
                        <div class="card border-0 shadow py-2">
                            <div class="card-body mx-3">
                                <h4 class="text-uppercase text-dark text-center fw-bold">  New Specialization</h4>
                                @if(session('success'))
                                <h6 class="text-center text-success">{{ session('success') }}</h6>
                                @endif                    
                                <form action="{{route('savespecialization')}}" method="post">
                                    @csrf
                                    <input type="text" class="form-control my-4 py-2" name="title" id="title" placeholder="Specialization" value="{{old('title')}}" required>
                                    @error('title')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('/script.js')}}"></script>
    <!-- end: JS -->
</body>

</html>