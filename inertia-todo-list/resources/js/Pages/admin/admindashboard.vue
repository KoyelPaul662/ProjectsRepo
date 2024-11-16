<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import axios from 'axios';
import $ from 'jquery';

onMounted(() => {
  initExternalScript();
  registrationChart();
  dregistrationChart();
});

const props= defineProps({
        auth:Object,
        datauser:Array,
        datadoctor:Array,
        datareqalls:Array,
    })

  const nameheader= props.auth.user.name;
  const datausers= props.datauser;
  const datadoctors= props.datadoctor;
  const datareqallss= props.datareqalls;

  //alert(nameheader)  
</script>

<template>
     <AdminSidebar  />
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
               <!-- start: Navbar -->
               <Header  :nameheader="nameheader"/>
            <!-- end: Navbar -->
            <div class="py-4">               
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Doctor</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{ datadoctors }}</p>                          
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{ datausers }}</p>                          
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{ datareqallss }}</p>                          
                            </div>
                        </div>
                    </div>
                  
                    <div class="container mt-3 alltextcolor">
                        <div class="card border-0 shadow py-2">
                            <h4 class="text-uppercase text-dark text-center fw-bold">  User's Record:</h4>
                            <canvas id="registrationChart" height="30%" width="75%"></canvas>
                        </div>
                    </div>
        
                    <div class="container alltextcolor">
                        <div class="card border-0 shadow mt-3 py-2">
                            <h4 class="text-uppercase text-dark text-center fw-bold">  Doctor's Record:</h4>
                            <canvas id="doctorsregistrationChart" height="30%" width="75%"></canvas>
                        </div>    
                    </div>
                </div>
                <!-- end: Content -->
            </div>
        </div>
    </main>
    <!-- end: Main -->
</template>

<script> 
  function registrationChart() {
    axios.get('/chart')
    .then(response => {
        const data = response.data;
        var dates = [];
        var counts = [];
        data.forEach(element => {
            dates.push(element.reg_date);
            counts.push(element.count);
        });

        // Rest of your Chart.js code
        var ctx = document.getElementById('registrationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Registration',
                    data: counts,
                    // backgroundColor: 'blue',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },

            options: {
                responsive: true,
                animation: {
                    duration: 100,
                    easing: 'linear',
                    from: 5,
                    to: 0,
                    loop: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "Date"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "No of Register"
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })

    .catch(error => {
        console.error(error);
    });
  }

  function dregistrationChart() {
    axios.get('/doctorchart')
    .then(response => {
        const data = response.data;
        var dates = [];
        var counts = [];
        data.forEach(element => {
            dates.push(element.reg_date);
            counts.push(element.count);
        });

        // Rest of your Chart.js code
        var ctx = document.getElementById('doctorsregistrationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Registration',
                    data: counts,
                    // backgroundColor: 'blue',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },

            options: {
                responsive: true,
                animation: {
                    duration: 100,
                    easing: 'linear',
                    from: 5,
                    to: 0,
                    loop: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "Date"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "No of Register"
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })

    .catch(error => {
        console.error(error);
    });
  }
</script> 




