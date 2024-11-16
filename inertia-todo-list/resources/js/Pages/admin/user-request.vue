<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
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
    datareqs:Array,
    auth:Object,
    // selectAllChecked:false,
})
async function getApprove(data) {
    const result = await Swal.fire({
        text: 'Are you sure you want to approve it?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Approve'
    });

    if (result.isConfirmed) {
        router.get('/getApprove/' + data.id);
        Swal.fire({
            title: 'Approved!',
            text: 'Approved Successfully',
            icon: 'success',
            timer:3000,
            showConfirmButton:false,
        });
    }
}

async function getReject(data) {
    const result = await Swal.fire({
        text: 'Are you sure you want to reject?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Reject'
    });

    if (result.isConfirmed) {
        router.get('/getReject/' + data.id);
        Swal.fire({
            title: 'Rejected!',
            text: 'Rejected Successfully',
            icon: 'success',
            timer:3000,
            showConfirmButton:false,
        });
    }
}
const nameheader= props.auth.user.name;
</script>

<template>
     <AdminSidebar  />
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
               <Header :nameheader="nameheader"/>
            <!-- end: Navbar -->
            <!-- Starts Content -->
            <div class="container mt-5" id="beforebulkdiv">                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>                               
                            <th scope="col">
                                Patient Name                                 
                            </th>
                            
                            <th scope="col">
                                Patient Phone                                
                            </th>
                            <th scope="col">
                                Patient Age                                  
                            </th> 
                            <th scope="col">
                                Patient Gender                                  
                            </th> 
                            <th scope="col">
                                Doctor                                 
                            </th>
                            <th scope="col">
                                Schedule Day                                 
                            </th>
                            <th scope="col">
                                Time From                                
                            </th>
                            <th scope="col">
                                Time To                                
                            </th>
                            <th scope="col">
                                Action                                  
                            </th>                                                          
                        </tr>
                    </thead>   

                    <tbody>                      
                        <tr v-for="data in datareqs.data" :key="data.id">                                        
                            <td>{{ data.name }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.age }}</td>
                            <td v-if="data.gender=='M'">Male</td>
                            <td v-if="data.gender=='F'">FeMale</td>
                            <td v-if="data.gender==''">Male</td>
                            <td>{{ data.doctorname }}</td>
                            <td>{{ data.doctorday }}</td>
                            <td>{{ data.doctortime }}</td>
                            <td>{{ data.totime}}</td>
                            <td v-if="data.status=='P'">
                                <a href="" class="btn btn-primary me-1" @click.prevent="getApprove(data)">Confirm</a> 
                                <a href="" class="btn btn-danger" @click.prevent="getReject(data)">Reject</a> 
                            </td>
                            <td v-if="data.status=='A'">
                                <p class="text-success"> Confirmed</p>
                            </td>
                            <td v-if="data.status=='R'">
                                <p class="text-danger"> Rejected</p>
                            </td>
                            <td v-if="data.status=='C'">
                                <p class="text-danger"> Request Cancelled</p>
                            </td>                    
                        </tr>                                      
                    </tbody>
                </table>
                <!-- Starts Pagination from here -->
                <div class="m-2 p-2">
                    <div class="d-flex gap-2">
                        <template v-for="(link,key) in datareqs.links" :key="key">
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






