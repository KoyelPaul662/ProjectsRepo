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
            <div class="container mt-3 pt-3">
                <div class="col-10 col-sm-8 col-md-12 m-auto">
                    <div class="card border-0 shadow py-2">
                        <div class="card-body mx-3">
                            <h4 class="text-uppercase text-dark text-left fw-bold">  Choose Specialization:</h4>                
                            <form action="{{route('searchdoctor')}}" method="post">
                              @csrf
                              <select name="specialization_id" id="specialization_id" class="form-control my-4 py-2">
                                <option value=""> Select Specialization</option>
                                   @foreach($data as $datas)
                                        <option value="{{$datas->id}}">{{$datas->title}}</option>
                                   @endforeach   
                               </select>
                              <button type="submit" class="btn btn-primary w-100 mt-2">Search</button>
                            </form>                              
                        </div> 
                    </div>
                </div>
            </div>


            <div class="container mt-5" id="beforebulkdiv">  
                @isset($dataForSpecial)              
                <table class="table table-striped mt-5" border="2px">
                    <thead>
                        <tr>    
                            <th scope="col">
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
                                ScheduleTime                                  
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>
                        
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
               
                    
                <tbody>                      
                    @foreach($dataForSpecial as $index => $datas)
                        <tr>                                 
                            <td class="slnoid">{{$index + 1}}</td>
                            <td>
                                <img src="doctor-images/{{$datas->image}}"> {{$datas->name}}
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
                                    elseif("F")
                                    {
                                        echo "Female";
                                    }                              
                                ?>                                   
                            </td>
                            <td>{{$datas->day}}</td>
                            <td>{{$datas->time}}</td>
                            <td>{{$datas->fees}}</td>
                            <td>
                                <a href="{{route('book-request',$datas->id)}}" class="btn btn-primary">Send Request</a> &nbsp;
                            </td>
                        </tr>                   
                    @endforeach                     
                </tbody>
                
                </table>
                @endisset
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