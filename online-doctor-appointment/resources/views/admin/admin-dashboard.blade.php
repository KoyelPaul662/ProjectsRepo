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
       <title>Admin</title>
</head>

<body>

   @include('../sidebar/sidebar')

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            @include('header')
            <!-- start: Content -->
            <div class="py-4">               
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Doctor</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$datadoctor}}</p>                          
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$datauser}}</p>                          
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{$datareqalls}}</p>                          
                            </div>
                        </div>
                    </div>
                  
                    <div class="container mt-3 alltextcolor">
                        <div class="card border-0 shadow py-2">
                            <h4 class="text-uppercase text-dark text-center fw-bold">  User's Record:</h4>
                            <canvas id="registrationChart" height="30%" width="75%"></canvas>
                        </div>
                    </div>
        
                    <div class="container alltextcolor">
                        <div class="card border-0 shadow mt-3 py-2">
                            <h4 class="text-uppercase text-dark text-center fw-bold">  Doctor's Record:</h4>
                            <canvas id="doctorsregistrationChart" height="30%" width="75%"></canvas>
                        </div>    
                    </div>
                </div>
                <!-- end: Content -->
            </div>

            <
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="{{asset('/script.js')}}"></script>
    <!-- end: JS -->
    <script> 
        $(document).ready(function () {     
            function registrationChart() {
                $.ajax({
                    url: "{{ route('chart')}}",
                    type: "GET",
                    success: function(data, status) {
                        console.log(data);
                        var dates = [];
                        var counts = [];
                        data.forEach(element => {
                            dates.push(element.reg_date);
                            counts.push(element.count);
                        });
                        console.log(counts);
                        // Chart.js configuration
                        var ctx = document.getElementById('registrationChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: dates,
                                datasets: [{
                                    label: 'User Registration',
                                    data: counts,
                                    // backgroundColor: 'blue',
                                    borderColor: 'rgba(0, 123, 255, 1)',
                                    borderWidth: 1
                                }]
                            },

                            options: {
                                responsive: true,
                                animation: {
                                    duration: 100,
                                    easing: 'linear',
                                    from: 5,
                                    to: 0,
                                    loop: true
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Date"
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "No of Register"
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    }
                });
            }
            registrationChart();

            function dregistrationChart() {
                $.ajax({
                    url: "{{ route('doctorchart')}}",
                    type: "GET",
                    success: function(data, status) {
                        console.log(data);
                        var dates = [];
                        var counts = [];
                        data.forEach(element => {
                            dates.push(element.reg_date);
                            counts.push(element.count);
                        });
                        console.log(counts);
                        // Chart.js configuration
                        var ctx = document.getElementById('doctorsregistrationChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: dates,
                                datasets: [{
                                    label: 'doctor Registration',
                                    data: counts,
                                    // backgroundColor: 'blue',
                                    borderColor: 'rgba(0, 123, 255, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                animation: {
                                    duration: 100,
                                    easing: 'linear',
                                    from: 5,
                                    to: 0,
                                    loop: true
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Date"
                                        }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: "No of Register"
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    }
                });
            }
            dregistrationChart();
        })
    </script> 

</body>

</html>