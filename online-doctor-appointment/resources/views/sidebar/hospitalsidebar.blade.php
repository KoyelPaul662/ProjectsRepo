<?php
$actualLink=request()->url() ;
?>
<!DOCTYPE html>
<html>
<body>
    <!-- Your HTML code for the sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white text-dark border-end sidecolor">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none fs-4 alltextcolor">Doctor</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-md-block alltextcolor"></i>           
        </div>

        <ul class="sidebar-menu p-3 m-0 mb-0">
                <li class="sidebar-menu-item has-dropdown navList alltextcolor <?= $actualLink=== url('doctor-dashboard')?' focused active':''?>">
                    <a href="{{url('doctor-dashboard')}}" class="pages-link sub-btn">
                        <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('all-request') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-hospital-line sidebar-menu-item-icon"></i>
                        Requests
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('all-request') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('all-request')}}" >
                                View Request
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="sidebar-menu-item has-dropdown navList alltextcolor">
                    <a href="{{route('logout')}}" class="pages-link sub-btn">
                        <i class="ri-shut-down-line sidebar-menu-item-icon"></i>
                        Log Out
                    </a>
                </li>
            </div>
        </ul>
    <div class="sidebar-overlay"></div>

<!-- Add the rest of your HTML code here -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
</body>
</html>
