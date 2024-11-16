<template>
  <div class="sidebar position-fixed top-0 bottom-0 bg-white text-dark border-end sidecolor">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none fs-4 alltextcolor">Admin</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-md-block alltextcolor"></i>           
        </div>

        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item has-dropdown navList alltextcolor"  :class="{'focused active': isDashboardLink}" >
                <Link href="/admindashboard" class="pages-link sub-btn">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </Link>
            </li>

            <!-- Specialization Section Starts-->
            <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isSpecializationLink}">
                <a href="#" class="pages-link sub-btn" >
                    <i class="ri-stack-fill sidebar-menu-item-icon"></i>
                    Specialization
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                </a>
                <ul class="sidebar-dropdown-menu alltextcolor ulclass">
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/new-specialization">
                            New Specialization
                        </Link>
                    </li>
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/view-specialization">
                            View Specialization
                        </Link>
                    </li>
                </ul>
            </li>
            <!-- Specialization Section Ends-->

            <!-- Doctor Section Starts-->
            <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isDoctorLink}">
                <a href="#" class="pages-link sub-btn" >
                    <i class="ri-nurse-line sidebar-menu-item-icon"></i>
                    Doctor
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                </a>
                <ul class="sidebar-dropdown-menu alltextcolor ulclass">
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/new-doctor">
                            New Doctor
                        </Link>
                    </li>
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/view-doctor">
                            View Doctor
                        </Link>
                    </li>
                </ul>
            </li>
            <!-- Doctor Section Ends-->

             <!-- User Section Starts-->
             <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isUserLink}">
                <a href="#" class="pages-link sub-btn" >
                    <i class="ri-file-user-line sidebar-menu-item-icon"></i>
                    User
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                </a>
                <ul class="sidebar-dropdown-menu alltextcolor ulclass">                   
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/view-user">
                            View User
                        </Link>
                    </li>
                </ul>
             </li>
            <!-- User Section Ends-->

             <!-- Request Section Starts-->
             <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isRequestLink}">
                <a href="#" class="pages-link sub-btn" >
                    <i class="ri-hospital-line sidebar-menu-item-icon"></i>
                    Request
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                </a>
                <ul class="sidebar-dropdown-menu alltextcolor ulclass">                   
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/user-request">
                            View Request
                        </Link>
                    </li>
                </ul>
             </li>
            <!-- Request Section Ends-->

            <!-- Schedule List Section Starts-->
            <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isScheduleLink}">
                <a href="#" class="pages-link sub-btn" >
                    <i class="ri-file-list-line sidebar-menu-item-icon"></i>
                    Schedule List
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                </a>
                <ul class="sidebar-dropdown-menu alltextcolor ulclass">                   
                    <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                        <Link href="/doctor-schedule">
                            View List
                        </Link>
                    </li>
                </ul>
            </li>
            <!-- Schedule List Section Ends-->
        </ul>
      </div>   
</template>
<div class="sidebar-overlay"></div>

<script>
import { Link } from '@inertiajs/vue3';
export default {
    components: {
    Link, // Register the Link component
   },
  computed: {
    isDashboardLink() {
      const currentURL = window.location.href;
      console.log(currentURL);
      const dashboardURL = "http://127.0.0.1:8000/admindashboard"; 
      console.log(dashboardURL);
      return currentURL == dashboardURL;
    }, 
    isSpecializationLink() {
      const currentURL = window.location.href;
      //alert(currentURL)
      const NewSpURL = "http://127.0.0.1:8000/new-specialization";
      const ViewSpURL = "http://127.0.0.1:8000/view-specialization";
      if(currentURL == NewSpURL || currentURL == ViewSpURL){
         return true;
      }
      else{
        return false;
      }
    }, 
    isDoctorLink() {
      const currentURL = window.location.href;
      const NewDoctorURL = "http://127.0.0.1:8000/new-doctor";
      const ViewDoctorpURL = "http://127.0.0.1:8000/view-doctor";
      if(currentURL == NewDoctorURL || currentURL == ViewDoctorpURL){
         return true;
      }
      else{
        return false;
      }
    }, 

    isUserLink() {
      const currentURL = window.location.href;
      const ViewUserpURL = "http://127.0.0.1:8000/view-user";
      if(currentURL == ViewUserpURL){
         return true;
      }
      else{
        return false;
      }
    }, 

    isRequestLink() {
      const currentURL = window.location.href;
      const ViewReqURL = "http://127.0.0.1:8000/user-request";
      if(currentURL == ViewReqURL){
         return true;
      }
      else{
        return false;
      }
    }, 

    isScheduleLink() {
      const currentURL = window.location.href;
      const ViewUserpURL = "http://127.0.0.1:8000/doctor-schedule";
      if(currentURL == ViewUserpURL){
         return true;
      }
      else{
        return false;
      }
    }, 

  },
};
</script>

<!-- <script setup>
import { router } from '@inertiajs/vue3';
function chartview() {
    router.get('/chart'); 
}
</script> -->



