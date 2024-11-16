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

    @include('../sidebar/usersidebar')

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            @include('header')
            <!-- start: Content -->
            <div class="py-4">               
                <div class="row g-3">                   
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Approved Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$totalapreq}}</p>                          
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title"> Rejected Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$totalRejreq}}</p>                          
                            </div>
                        </div>
                    </div>
                   

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Cancelled Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$totalcanreq}}</p>                          
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Content -->
            </div>
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('/script.js')}}"></script>
    <!-- end: JS -->
</body>

</html>