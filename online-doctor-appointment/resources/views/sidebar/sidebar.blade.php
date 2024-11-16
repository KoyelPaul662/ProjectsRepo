<?php
$actualLink=request()->url() ;
?>
<!DOCTYPE html>
<html>
<body>
    <!-- Your HTML code for the sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white text-dark border-end sidecolor">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none fs-4 alltextcolor">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-md-block alltextcolor"></i>           
        </div>

        <ul class="sidebar-menu p-3 m-0 mb-0">
                <li class="sidebar-menu-item has-dropdown navList alltextcolor <?= $actualLink=== url('admin-dashboard')?' focused active':''?>">
                    <a href="{{url('admin-dashboard')}}" class="pages-link sub-btn">
                        <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                        Dashboard
                    </a>
                </li>
                {{-- <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('new-doctor') || $actualLink=== url('view-doctor') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-hospital-line sidebar-menu-item-icon"></i>
                        Hospital
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('new-hospital') || $actualLink=== url('view-hospital') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('new-hospital')}}" >
                                New Hospital
                            </a>
                        </li>
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('view-hospital')}}" >
                                View Hospital
                            </a>
                        </li>
                    </ul>
                </li>  --}}

                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('new-specialization') || $actualLink=== url('view-specialization') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-stack-fill sidebar-menu-item-icon"></i>
                        Specialization
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('new-specialization') || $actualLink=== url('view-specialization') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('new-specialization')}}" >
                                New Specialization
                            </a>
                        </li>
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('view-specialization')}}" >
                                View Specialization
                            </a>
                        </li>
                    </ul>
                </li> 
           

                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('new-doctor') || $actualLink=== url('view-doctor') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-nurse-line sidebar-menu-item-icon"></i>
                        Doctor
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('new-doctor') || $actualLink=== url('view-doctor') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('new-doctor')}}" >
                                New Doctor
                            </a>
                        </li>
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('view-doctor')}}" >
                                View doctor
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('user-view') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-file-user-line sidebar-menu-item-icon"></i>
                        Users
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('user-view') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('user-view')}}" >
                                View Users
                            </a>
                        </li>
                    </ul>
                </li> 
                
                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('user-request') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-hospital-line sidebar-menu-item-icon"></i>
                        Requests
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('user-request') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('user-request')}}" >
                                View Request
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('doctor-schedule') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="ri-file-list-line sidebar-menu-item-icon"></i>
                         Schedule list
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('doctor-schedule') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('doctor-schedule')}}" >
                                View List
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="sidebar-menu-item has-dropdown navList alltextcolor  <?= $actualLink=== url('view-feedback') ?' focused active':''?>">
                    <a href="#" class="pages-link sub-btn">
                        <i class="bi bi-chat-text sidebar-menu-item-icon"></i>
                         Feedback
                        <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                    </a>
                    <ul class="sidebar-dropdown-menu alltextcolor ulclass <?= $actualLink=== url('view-feedback') ?' focused active':''?>">
                        <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                            <a href="{{url('view-feedback')}}" >
                                View Feedback
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
