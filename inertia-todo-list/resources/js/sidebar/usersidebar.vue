<template>
    <div class="sidebar position-fixed top-0 bottom-0 bg-white text-dark border-end sidecolor">
          <div class="d-flex align-items-center p-3">
              <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none fs-4 alltextcolor">User</a>
              <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-md-block alltextcolor"></i>           
          </div>
  
          <ul class="sidebar-menu p-3 m-0 mb-0">
              <li class="sidebar-menu-item has-dropdown navList alltextcolor"  :class="{'focused active': isDashboardLink}" >
                  <Link href="/userdashboard" class="pages-link sub-btn">
                      <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                      Dashboard
                  </Link>
              </li>

            <!-- Doctor Section Starts-->
              <li class="sidebar-menu-item has-dropdown navList alltextcolor" :class="{'focused active': isRequest}">
                  <a href="#" class="pages-link sub-btn" >
                      <i class="ri-nurse-line sidebar-menu-item-icon"></i>
                      Request
                      <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto carebtn"></i>
                  </a>
                  <ul class="sidebar-dropdown-menu alltextcolor ulclass">
                      <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                          <Link href="/new-request">
                              New Request
                          </Link>
                      </li>
                      <li class="sidebar-dropdown-menu-item navList alltextcolor mx-2 sub-menu">
                          <Link href="/view-request">
                              View Request
                          </Link>
                      </li>
                  </ul>
              </li>
              <!-- Doctor Section Ends-->
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
        const dashboardURL = "http://127.0.0.1:8000/userdashboard"; 
        console.log(dashboardURL);
        return currentURL == dashboardURL;
      }, 
      isRequest() {
        const currentURL = window.location.href;
        //alert(currentURL)
        const NewSpURL = "http://127.0.0.1:8000/new-request";
        const ViewSpURL = "http://127.0.0.1:8000/view-request";
        if(currentURL == NewSpURL || currentURL == ViewSpURL){
           return true;
        }
        else{
          return false;
        }
      }, 
    },
  };
  </script>
  
  
  
  
  