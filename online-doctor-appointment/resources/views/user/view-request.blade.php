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
  @include('../sidebar/usersidebar')
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
                    <table class="table table-striped mt-5">
                        <thead>
                            <tr>    
                                <th scope="col">
                                   Sl_No                                
                                </th>    
            
                                <th scope="col">
                                    Doctor                                 
                                </th>
                                    
                                <th scope="col">
                                   Schedule Day                                 
                                </th>
                               
                                <th scope="col">
                                     Time From                                 
                                </th>
                                <th scope="col">
                                     Time To                                 
                                </th>
                                <th scope="col">
                                    Fees                                  
                                </th> 
                                <th scope="col">
                                    Status                                  
                                </th>                            
                                <th scope="col">Action</th>
                            </tr>
                        </thead>                   
                        <tbody>                      
                            @foreach($datareq as $index => $datas)
                                <tr>                                 
                                    <td class="slnoid">{{$index + 1}}</td> 
                                    <td>{{$datas->doctorname}}</td>
                                    <td>{{$datas->doctorday}}</td>
                                    <td>{{$datas->doctortime}}</td>
                                    <td>{{$datas->totime}}</td>
                                    <td>{{$datas->doctorfees}}</td>
                                    <td>
                                        <?php 
                                            if($datas->status=='P')
                                            {
                                                echo "Pending";
                                            }                           
                                            elseif($datas->status=='A')
                                            {
                                                echo "Approved";
                                            }                              
                                            elseif($datas->status=='R')
                                            {
                                                echo "Rejected";
                                            }                              
                                            elseif($datas->status=='C')
                                            {
                                                echo "Cancelled";
                                            }                              
                                        ?>                                   
                                    </td>      
                                    <td>
                                        @if($datas->status=='P')                       
                                            <a href="{{route('usergetCancel',$datas->id)}}" class="btn btn-danger" onclick="event.preventDefault(); CancelAppointment('{{ $datas->id }}');">Cancel Request</a> &nbsp;                              
                                        @elseif($datas->status=="C")
                                            <p class="text-danger"> 
                                                Cancelled
                                            </p>&nbsp;
                                        @elseif($datas->status=="A" || $datas->status=="R") 
                                            <p class="text-danger"> 
                                                <a href="#" class="btn btn-danger" onclick="getCancelSwitch()">Cancel Request</a> &nbsp;   
                                            </p>&nbsp;     
                                        @endif                                                                                                                 
                                    </td>
                                </tr>                   
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            
                <div class="container">
                    {{$datareq->links('pagination::bootstrap-5')}}
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

    <script>
        function CancelAppointment(studentId) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel Appointment!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('usergetCancel', '') }}/" + studentId;
                }
            });
        }
  
        document.addEventListener("DOMContentLoaded", function () {
            if (document.querySelector(".flash-success")) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    showConfirmButton:false, 
                    text: "Cancelled Successfully",
                    timer:3000,
                }).then(() => {
                    window.location.reload(); // Refresh the page to clear the flash message
                });
            }
        });      
    </script>

<script>
    function getCancelSwitch(){
      console.log('hi');
        Swal.fire({
            position : 'middle-center',
            icon:'warning',
            title :'After Approved Or Rejection  You can not Cancel your Appointment',
            showConfirmButton :false,
            timerProgressBar: true,
            timer: 3000
        })
    }
</script>
  

</body>

</html>