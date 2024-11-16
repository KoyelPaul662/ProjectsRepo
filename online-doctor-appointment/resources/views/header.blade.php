 <!-- start: Navbar -->
 <?php
 use Illuminate\Support\Facades\Auth;
 ?>
 <nav class="px-3 py-2 bg-white rounded shadow">
    <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none" id="sidebar-togging" style="color:blue;"></i>
    <h5 class="fw-bold mb-0 me-auto alltextcolor">
        @if (Auth::guard('hospital')->check()) 
            Welcome Back {{ucwords(Auth::guard('hospital')->user()->name)}}
        @elseif(Auth::guard('admin')->check())
             Welcome Back {{ucwords(Auth::guard('admin')->user()->name)}}
        @elseif(Auth::guard('user')->check())
            Welcome Back {{ucwords(Auth::guard('user')->user()->name)}}   
        @endif    
      
    {{-- <form class="d-flex align-items-center">       
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-primary" type="submit"><i class="ri-search-line"></i></button>
    </form> --}}
    </h5>
    &nbsp;
   
    <i class="ri-moon-line moon-icon alltextcolor" id="moon-icon"></i>&nbsp;
    <div class="dropdown">
        <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <span class="me-2 d-none d-sm-block">admin</span> -->
            
            @if(Auth::guard('hospital')->check()) 
                <img class="navbar-profile-image" src="doctor-images/{{Auth::guard('hospital')->user()->image}}">

            @elseif(Auth::guard('admin')->check() || Auth::guard('user')->check()) 
                <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
            @endif
            
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>         
        </ul>
    </div>
</nav>
<!-- end: Navbar -->