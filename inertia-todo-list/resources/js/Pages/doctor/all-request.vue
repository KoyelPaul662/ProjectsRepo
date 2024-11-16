<script setup>
import DoctorSidebar from '@/sidebar/doctorsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';
import Swal from 'sweetalert2'

onMounted(() => {
  initExternalScript();
});

const props= defineProps({
    datareq:Array,
    auth:Object,
})
const nameheader= props.auth.user.name;
</script>

<template>
    <DoctorSidebar  />
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
               <Header :nameheader="nameheader"/>
            <!-- end: Navbar -->
            <!-- Starts Content -->
            <div class="container mt-5" id="beforebulkdiv">  
                <!-- <p class="text-center text-success" v-if="$page.props.flash.success">
                    {{ $page.props.flash.success }}
                </p>     
                <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                    {{ $page.props.flash.errormsg }}
                </p>                         -->
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>    
                            <th scope="col">
                                Name                                 
                            </th>
                                                                
                            <th scope="col">
                                Phone                                
                            </th>
                        
                            <th scope="col">
                                Age                                  
                            </th> 
                            <th scope="col">
                                Gender                                  
                            </th> 
                            <th scope="col">
                                Status                                  
                            </th>                                                          
                        </tr>
                    </thead>     

                    <tbody>                      
                        <tr v-for="data in datareq.data" :key="data.id">                                          
                            <td>{{ data.name }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.age }}</td> 
                            <td v-if="data.gender=='M'">Male</td>
                            <td v-if="data.gender=='F'">FeMale</td>
                            <td v-if="data.gender==''">Male</td>                     
                            <td>
                                <p class="text-danger" v-if="data.status=='C'"> Cancelled </p>
                                <p class="text-success" v-if="data.status=='A'"> Approved </p>
                                <p class="text-primary" v-if="data.status=='P'"> Pending </p>
                                <p class="text-danger" v-if="data.status=='R'"> Rejected </p>
                            </td>                                   
                        </tr>                                      
                    </tbody>
                </table>
                <!-- Starts Pagination from here -->
                <div class="m-2 p-2">
                        <div class="d-flex gap-2">
                            <template v-for="(link,key) in datareq.links" :key="key">
                                <Link :href="link.url" v-html="link.label" />
                            </template>
                        </div>                        
                    </div>
                <!-- Ends pagination here -->
            </div>
            <!-- end: Navbar -->
        </div>
    </main>
    <!-- end: Main -->
</template>

<style>       
img {
  height: 30px;
  border-radius: 50%;
  margin: 3px;
}
</style> 


<script>
$(document).ready(function () {
    $(document).on('click', '#bulkmode', function (e) {
        e.preventDefault();         
        $("#bulkmode").hide(); 
        $("#trashid").hide(); 
        $(".slnoid").hide(); 
        $("#slidnos").hide(); 
        $("#selected_id").show();      
        $("#deselected_id").show();      
        $("#delete_id").show();      
        $("#cancelbulk").show();            
        $("#select_all_ids").show();            
        $(".scheckbox").show();            
    });

    $(document).on('click', '#cancelbulk', function (e) {
        e.preventDefault();         
        $("#bulkmode").show(); 
        $("#slidnos").show();  
        $(".slnoid").show(); 
        $("#selected_id").hide();      
        $("#deselected_id").hide();      
        $("#delete_id").hide();      
        $("#cancelbulk").hide();            
        $("#select_all_ids").hide();            
        $(".scheckbox").hide();      
    });
});
</script>



