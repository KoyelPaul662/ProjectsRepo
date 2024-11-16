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
                    <button class="btn btn-primary" id="bulkmodes">Bulk Selected</button>
                    <button class="btn btn-success" id="selected_ids" style="display: none;">Active All Selected</button>
                    <button class="btn btn-warning" id="deselected_ids" style="display: none;">DeActive All Selected</button>         
                    <button class="btn btn-primary" id="cancelbulks" style="display: none;">Cancel Bulk</button>             
                    <table class="table table-striped mt-2">
                        <thead>
                            <tr>    
                                <th><input type="checkbox" id="select_all_idss" style="display: none;"></th> 
                                <th scope="col" id="slidno">
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
                                    Gender                                  
                                </th>                              
                                <th scope="col">
                                    Action                                  
                                </th>
                            </tr>
                        </thead>
                    
                        <tbody>                      
                            @foreach($data as $index => $datas)
                                <tr id="beforbulks">   
                                    <td><input type="checkbox" name="id" class="scheckboxs" value="{{$datas->id}}" data-status="{{$datas->status}}" style="display: none;"></td>                              
                                    <td class="slnoids">{{$index + 1}}</td>
                                    <td>
                                        {{$datas->name}}
                                    </td>   
                                    <td>{{$datas->email}}</td>
                                    <td>{{$datas->phone}}</td>
                                    <td>{{$datas->address}}</td>
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
                                    <td>
                                        @if($datas->status=='0')                       
                                            <a href="{{route('usergetApprove',$datas->id)}}" class="btn btn-success"> 
                                                Active
                                            </a> &nbsp;
                                        @elseif($datas->status=="1")
                                            <a href="{{route('usergetUnApprove',$datas->id)}}" class="btn btn-danger"> 
                                                Inactive
                                            </a> 
                                        @endif
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
        $("#select_all_idss").click(function() {
            $(".scheckboxs").prop('checked', $(this).prop('checked'));
        });

        // Activate all starts from here
        $("#selected_ids").click(function(e){
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
                    url:'{{route('user-active-status')}}',
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
                                window.location.href = "{{ 'user-view' }}";
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
        $("#deselected_ids").click(function(e){
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
                    url:'{{route('user-deactive-status')}}',
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
                                    window.location.href = "{{ 'user-view' }}";
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


        
    })
   </script>


    <script>
        $(document).ready(function () {
            $(document).on('click', '#bulkmodes', function (e) {
                e.preventDefault();         
                $("#bulkmodes").hide(); 
                $(".slnoids").hide(); 
                $("#slidno").hide(); 
                $("#selected_ids").show();      
                $("#deselected_ids").show();      
                $("#delete_ids").show();      
                $("#cancelbulks").show();            
                $("#select_all_idss").show();            
                $(".scheckboxs").show();            
            });

            $(document).on('click', '#cancelbulks', function (e) {
                e.preventDefault();         
                $("#bulkmodes").show(); 
                $("#slidno").show();  
                $(".slnoids").show();
                $("#selected_ids").hide();      
                $("#deselected_ids").hide();      
                $("#delete_ids").hide();      
                $("#cancelbulks").hide();            
                $("#select_all_idss").hide();            
                $(".scheckboxs").hide();      
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