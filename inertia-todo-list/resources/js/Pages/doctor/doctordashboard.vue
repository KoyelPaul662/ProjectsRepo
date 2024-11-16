<script setup>
import DoctorSidebar from '@/sidebar/doctorsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import axios from 'axios';
import $ from 'jquery';

onMounted(() => {
  initExternalScript();
});

const props= defineProps({
        auth:Object,
        totalreq:Array,
        totalapreq:Array,
        totalcanreq:Array,
        totalRejreq:Array,
        totalpenreq:Array,

    })

const nameheader= props.auth.user.name;
const totalreqs=props.totalreq; 
const totalapreqs=props.totalapreq; 
const totalcanreqs=props.totalcanreq; 
const totalRejreqs=props.totalRejreq; 
const totalpenreqs=props.totalpenreq; 
</script>

<template>
     <DoctorSidebar  />
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
               <!-- start: Navbar -->
               <Header :nameheader="nameheader" />
            <!-- end: Navbar -->
            <div class="py-4">               
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Request </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{totalreqs}}</p>                          
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-secondary o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Pending Request </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{totalpenreqs}}</p>                          
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Approved Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{totalapreqs}}</p>                          
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Rejected Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{totalRejreqs}}</p>                          
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <h5 class="card-title">Cancelled Request</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                                <p class="card-text">{{totalcanreqs}}</p>                          
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Content -->
            </div>
        </div>
    </main>
    <!-- end: Main -->
</template>






