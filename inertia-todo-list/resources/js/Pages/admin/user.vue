<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import { router } from '@inertiajs/vue3'
import {Link} from '@inertiajs/inertia-vue3'
import { ref } from 'vue';
import Swal from 'sweetalert2'
let selectedDoctors = [];
let selectAllChecked = false;
const isChecked = ref('H');
onMounted(() => {
  initExternalScript();
});

const props= defineProps({
    Users:Array,
    auth:Object,
    // selectAllChecked:false,
})

async function getUserActive(User) {
    router.get('/usergetApprove/' + User.id);
}

async function getUserInActive(User) {
    router.get('/usergetUnApprove/' + User.id);
}

// Function to toggle selection of a doctor
function toggleSelection(user) {
    if (selectedDoctors.includes(user)) {
        selectedDoctors = selectedDoctors.filter(item => item !== user);
    } else {
        selectedDoctors.push(user);
    }
    console.log(selectedDoctors);
}

function toggleSelectAll() {
//    selectAllChecked=true;
    if (selectAllChecked) {
        selectedDoctors = [];
        selectAllChecked= false;
        isChecked.value= 'N';
    } else {
        for (const user of props.Users.data) {
            selectedDoctors.push(user);
            // router.delete('/doctors/' + doctor.id);
        }   
        selectAllChecked= true;
        isChecked.value= 'Y';
    }   
    console.log(selectAllChecked);    
    console.log(selectedDoctors);
    console.log(isChecked);
}

async function bulkactive() {
    if (selectedDoctors.length === 0) {
        Swal.fire({
            title: 'No User Selected',
            text: 'Please select at least one user to active.',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Confirm Bulk Activation',
        text: 'Are you sure you want to activate selected users?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Active'
    });

    if (result.isConfirmed) {
        // Proceed with bulk deletion
        for (const user of selectedDoctors) {
            //await router.delete('/doctors/' + doctor.id);
            router.get('/usergetApprove/' + user.id);
        }

        // Show success message
        Swal.fire({
            title: 'Activated!',
            text: 'Selected user activated successfully',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false,
        });
        // Clear selectedDoctors array
        selectedDoctors = [];
    }
}


async function bulkInactive() {
    if (selectedDoctors.length === 0) {
        Swal.fire({
            title: 'No User Selected',
            text: 'Please select at least one user to Inactive.',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Confirm Bulk DeActivation',
        text: 'Are you sure you want to Inactivate selected users?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Inactive'
    });

    if (result.isConfirmed) {
        // Proceed with bulk deletion
        for (const user of selectedDoctors) {
            //await router.delete('/doctors/' + doctor.id);
            router.get('/usergetUnApprove/' + user.id);
        }

        // Show success message
        Swal.fire({
            title: 'DeActivated!',
            text: 'Selected users Deactivated successfully',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false,
        });

        // Clear selectedDoctors array
        selectedDoctors = [];
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
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" id="bulkmode">Bulk Selected</button>
                    <button class="btn btn-success" id="selected_id" @click="bulkactive" style="display: none;">Active All Selected</button>
                    <button class="btn btn-warning" id="deselected_id" @click="bulkInactive" style="display: none;">DeActive All Selected</button>                
                    <button class="btn btn-primary" id="cancelbulk" style="display: none;">Cancel Bulk</button> 
                </div>          
                   
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>    
                            <th scope="col">
                                <input type="checkbox" v-model="selectAllChecked" @change="toggleSelectAll" id="select_all_ids" style="display: none;">
                            </th>
                            <th scope="col">
                                Name                                 
                            </th>
                                
                            <th scope="col">
                                Email                                
                            </th>
                            <th scope="col">
                                Phone                                 
                            </th>
                            
                            <th scope="col">
                                Address                                  
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
                        <tr v-for="User in Users.data" :key="User.id">  
                        <td>
                            <input type="checkbox" 
                            v-model="selectedDoctors" 
                            :value="User" 
                            @change="toggleSelection(User)" 
                            class="scheckbox" 
                            :checked="isChecked === 'Y'"
                             style="display: none;" />
                        </td>
                        <td>{{ User.name }}</td>
                        <td>{{ User.email }}</td>
                        <td>{{ User.phone }}</td>
                        <td>{{ User.address }}</td>
                        <td v-if="User.gender=='M'">Male</td>
                        <td v-if="User.gender=='F'">FeMale</td>
                        <td v-if="User.gender==''">Male</td>
                        <td v-if="User.status=='0'">
                            <a href="" class="btn btn-primary" @click.prevent="getUserActive(User)">Active</a> 
                        </td>
                        <td v-if="User.status=='1'">
                            <a href="" class="btn btn-danger" @click.prevent="getUserInActive(User)">InActive</a> 
                        </td>                                              
                    </tr>                                      
                    </tbody>
                </table>
                <!-- Starts Pagination from here -->
                <div class="m-2 p-2">
                    <div class="d-flex gap-2">
                        <template v-for="(link,key) in Users.links" :key="key">
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
        $("#cancelbulk").hide();            
        $("#select_all_ids").hide();            
        $(".scheckbox").hide();      
    });
});
</script>



