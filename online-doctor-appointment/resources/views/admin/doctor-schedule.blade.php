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
    <style>       
      img {
        height: 30px;
        border-radius: 50%;
        margin: 3px;
      }
    </style>   
   @include('../sidebar/sidebar')
    <!-- start: Main -->
    <main class="bg-light">
        <div class="">
            @include('header')
             <!-- start: Content -->
                <!-- Show Sunday Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Sunday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                   Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Sundayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title}}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Sunday Schedule div ends from here -->
                <!-- Show Monday Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Monday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Mondayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Monday Schedule div ends from here -->

                <!-- Show Tuesday Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Tuesday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($TuesDayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Tuesday Schedule div ends from here -->

                <!-- Show Wednesday Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Wednesday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Wednesdayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Wednesday Schedule div ends from here -->


                <!-- Show Thursdayrecord Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Thursday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Thursdayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Thursdayrecord Schedule div ends from here -->


                <!-- Show Fridayrecord Schedule div starts from here -->
                <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Friday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Fridayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                </div>
                <!-- Show Fridayrecord Schedule div ends from here -->


                  <!-- Show Saturdayrecord Schedule div starts from here -->
                  <div class="container mt-5">                          
                    <h5 class="alltextcolor fw-bold text-uppercase">Saturday:</h5> 
                    <table class="table table-striped mt-2">                      
                        <thead>
                            <tr>    
                                <th scope="col">
                                    Sl&nbsp;No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                    Specialization                                
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th>                              
                                <th scope="col">
                                    Schedule&nbsp;Day                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
                                </th>                                                     
                            </tr>
                        </thead>                  
                        <tbody>                      
                            @foreach($Saturdayrecord as $index => $datas)
                            <tr>                                                             
                                <td>{{$index + 1}}</td>
                                <td>
                                    <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
                                </td>   
                                <td>{{$datas->specialization->title }}</td>
                                <td>{{$datas->fees}}</td>
                                <td>{{$datas->day}}</td>
                                <td>{{$datas->time}}</td>
                                <td>{{$datas->totime}}</td>                                                            
                            </tr>                   
                        @endforeach     
                        </tbody>
                    </table>
                  </div>
                <!-- Show Saturdayrecord Schedule div ends from here -->
              
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