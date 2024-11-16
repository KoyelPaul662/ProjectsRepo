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

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-dark text-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active navList">
                <a href="#" class="pages-link">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            
            <li class="sidebar-menu-item has-dropdown navList">
                <a href="#" class="pages-link">
                    <i class="ri-pages-line sidebar-menu-item-icon"></i>
                    Hospital
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            New Hospital
                        </a>
                    </li>
                    
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                           View Hospital
                        </a>
                    </li>                  
                </ul>
            </li>          
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="mainclass">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                
                <h5 class="fw-bold mb-0 me-auto"></h5>
                
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Hi,Admin</span>
                        <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                      
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{asset('/script.js')}}"></script>
    <script>
        const navLinks = document.querySelectorAll(".navList");
        navLinks.forEach(function (element){
    element.addEventListener('click',function (){
        navLinks.forEach((e)=>{
            e.classList.remove('active')
            this.classList.add('active')
        })
    })
})
    </script>
    <!-- end: JS -->

 
</body>

</html>