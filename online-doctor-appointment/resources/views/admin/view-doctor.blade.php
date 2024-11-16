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
        <div class="p-2">
            @include('header')
             <!-- start: Content -->
                <!-- wrapper div starts from here -->
                <div class="container mt-5" >
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
                    <button class="btn btn-primary" id="bulkmode">Bulk Selected</button>
                    <button class="btn btn-success" id="selected_id" style="display: none;">Active All Selected</button>
                    <button class="btn btn-warning" id="deselected_id" style="display: none;">DeActive All Selected</button>
                    <button class="btn btn-danger" id="delete_id" style="display: none;">Delete All</button>
                    <button class="btn btn-primary" id="cancelbulk" style="display: none;">Cancel Bulk</button>             
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>    
                                <th><input type="checkbox" id="select_all_ids" style="display: none;"></th> 
                                <th scope="col" id="slidnos">
                                   Sl_No                                
                                </th>    
            
                                <th scope="col">
                                    Name                                 
                                </th>
                                    
                                <th scope="col">
                                    Email                                
                                </th>
                                <th scope="col">
                                   Phone                                 
                                </th>
                               
                                <th scope="col">
                                    Address                                  
                                </th>
                                <th scope="col">
                                    Age                                  
                                </th>
                                <th scope="col">
                                    Gender                                  
                                </th>
                                <th scope="col">
                                    ScheduleDay                                  
                                </th>
                                <th scope="col">
                                    Time&nbsp;From                                
                                </th>
                                <th scope="col">
                                    Time&nbsp;To                                
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
                            @foreach($data as $index => $datas)
                                <tr id="beforbulk">   
                                    <td><input type="checkbox" name="id" class="scheckbox" value="{{$datas->id}}" data-status="{{$datas->status}}" style="display: none;"></td>                              
                                    <td class="slnoid">{{$index + 1}}</td>
                                    <td>
                                        <img src="../doctor-images/{{$datas->image}}">{{$datas->name}}
                                    </td>   
                                    <td>{{$datas->email}}</td>
                                    <td>{{$datas->phone}}</td>
                                    <td>{{$datas->address}}</td>
                                    <td>{{$datas->age}}</td>
                                    <td>
                                        <?php 
                                            if($datas->gender=='M')
                                            {
                                                echo "Male";
                                            }                           
                                            else
                                            {
                                                echo "Female";
                                            }                              
                                        ?>                                   
                                    </td>
                                    <td>{{$datas->day}}</td>
                                    <td>{{$datas->time}}</td>
                                    <td>{{$datas->totime}}</td>
                                    <td>{{$datas->fees}}</td>
                                    <td>
                                        @if($datas->status=='0')                       
                                            <a href="{{route('doctorgetApprove',$datas->id)}}" class="btn btn-success"> 
                                                Active
                                            </a> &nbsp;
                                        @elseif($datas->status=="1")
                                            <a href="{{route('doctorgetUnApprove',$datas->id)}}" class="btn btn-danger"> 
                                                Inactive
                                            </a> 
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('doctoredit',$datas->id)}}" class="btn btn-primary">Update</a>
                                        <a href="{{ url('/doctor/delete') }}/{{ $datas->id }}"
                                            onclick="event.preventDefault(); deleteStudent('{{ $datas->id }}');">
                                            <button class="btn btn-danger m-2">Delete</button>
                                        </a> &nbsp;
                                    </td>
                                </tr>                   
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            
                <div class="container">
                    {{$data->links('pagination::bootstrap-5')}}
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
        $(function(e) {
        $("#select_all_ids").click(function() {
            $(".scheckbox").prop('checked', $(this).prop('checked'));
        });

        // Activate all starts from here
        $("#selected_id").click(function(e){
            e.preventDefault();
            var idsArr = [];
            $('input:checkbox[name=id]:checked').each(function(){
                var status = $(this).data('status');                  
                if (status === 0) {
                    idsArr.push($(this).val());
                }
            });
            console.log(idsArr);
            if (idsArr.length > 0) {  
                $.ajax({
                    url:'{{route('doctor-active-status')}}',
                    type:'GET',
                    data : {
                        idsArr : idsArr,
                        _token : '{{ csrf_token() }}'
                    },
                    success : function(response){
                        if (response.status === 200) {
                            Swal.fire({
                                hideConfirmButton:false,  
                                text: response.message,
                                icon: 'success',
                                timer:3000,
                            }).then(() => {
                                window.location.href = "{{ 'view-doctor' }}";
                                });                
                        }                
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });
                        }
                        console.log(response);
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    text: 'Nothing to Activate',
                }); 
            }    
        })
        // Activate all end here

        // DeActivate all starts from here
        $("#deselected_id").click(function(e){
            e.preventDefault();
            var idsArr = [];
            $('input:checkbox[name=id]:checked').each(function(){
                var status = $(this).data('status');                  
                if (status === 1) {
                    idsArr.push($(this).val());
                }
            });
            console.log(idsArr);
            if (idsArr.length > 0) {
                $.ajax({
                    url:'{{route('doctor-deactive-status')}}',
                    type:'GET',
                    data : {
                        idsArr : idsArr,
                        _token : '{{ csrf_token() }}'
                    },
                    success : function(response){
                        if (response.status === 200) {
                            Swal.fire({
                                showConfirmButton:false,  
                                text: response.message,
                                icon: 'success',
                                timer:3000,
                            }).then(() => {
                                    window.location.href = "{{ 'view-doctor' }}";
                                });                
                        }                
                        else {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                            });
                        }                  
                    console.log(response);
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    text: 'Nothing to DeActivate',
                }); 
            }
        })
        // DeActivate all end here


        // Delete all starts from here
        $("#delete_id").click(function(e){
            e.preventDefault();
            var idsArr = [];
            $('input:checkbox[name=id]:checked').each(function(){
                var status = $(this).data('status');                  
                if (status === 1) {
                    idsArr.push($(this).val());
                }
            });
            console.log(idsArr);
            if (idsArr.length > 0) {
                Swal.fire({
                    title: 'Are you sure to delete all items permanently?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes Delete all',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {                           
                        $.ajax({
                            url:'{{route('doctor-deleteall')}}',
                            type:'GET',
                            data : {
                                idsArr : idsArr,
                                _token : '{{ csrf_token() }}'
                            },
                            success : function(response){
                                if (response.status === 200) {
                                    Swal.fire({
                                        showConfirmButton:false,  
                                        text: response.message,
                                        icon: 'success',
                                        timer:3000,
                                    }).then(() => {
                                            window.location.href = "{{ 'view-doctor' }}";
                                        });                
                                }                
                                else {
                                    Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!',
                                    });
                                }                  
                            console.log(response);
                            }
                        })                          
                    }
                });
            }
            else{
                Swal.fire({
                    icon: 'error',
                    text: 'Nothing to delete',
                }); 
            }
        })
        // Delete all end here
    })
    </script>


    <script>
        $(document).ready(function () {
            $(document).on('click', '#bulkmode', function (e) {
                e.preventDefault();         
                $("#bulkmode").hide(); 
                $("#trashid").hide(); 
                $(".slnoid").hide(); 
                $("#slidnos").hide(); 
                $("#selected_id").show();      
                $("#deselected_id").show();      
                $("#delete_id").show();      
                $("#cancelbulk").show();            
                $("#select_all_ids").show();            
                $(".scheckbox").show();            
            });

            $(document).on('click', '#cancelbulk', function (e) {
                e.preventDefault();         
                $("#bulkmode").show(); 
                $("#slidnos").show();  
                $(".slnoid").show(); 
                $("#selected_id").hide();      
                $("#deselected_id").hide();      
                $("#delete_id").hide();      
                $("#cancelbulk").hide();            
                $("#select_all_ids").hide();            
                $(".scheckbox").hide();      
            });
        });
    </script>

    <script>
        function deleteStudent(studentId) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('doctor-delete', '') }}/" + studentId;
                }
            });
        }
    
        document.addEventListener("DOMContentLoaded", function () {
            if (document.querySelector(".flash-success")) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    showConfirmButton:false, 
                    text: "successfully deleted",
                    timer:3000,
                }).then(() => {
                    window.location.reload(); // Refresh the page to clear the flash message
                });
            }
        });
    </script>
</body>

</html>