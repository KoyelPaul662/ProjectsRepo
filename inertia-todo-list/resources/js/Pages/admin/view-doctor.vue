<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
import {Link} from '@inertiajs/inertia-vue3'
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import { router } from '@inertiajs/vue3'
import { ref } from 'vue';
import Swal from 'sweetalert2'
let selectedDoctors = [];
let selectAllChecked = false;
const isChecked = ref('H');
onMounted(() => {
  initExternalScript();
});

const props= defineProps({
    Doctors:Array,
    auth:Object,
    // selectAllChecked:false,
})
function edit(id) {
    router.get('/doctors/'+id+'/edit'); 
}

// function confirmDelete(todo) {
//     router.delete('/todos/'+todo.id); 
// }

async function confirmDelete(Doctor) {
    const result = await Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    });

    if (result.isConfirmed) {
        // Proceed with deletion
        await router.delete('/doctors/' + Doctor.id);
        // Show success message
        Swal.fire({
            title: 'Deleted!',
            text: 'Deleted Successfully',
            icon: 'success',
            timer:3000,
            showConfirmButton:false,
        });
    }
}

async function getActive(Doctor) {
    router.get('/doctorgetApprove/' + Doctor.id);
}

async function getInActive(Doctor) {
    router.get('/doctorgetUnApprove/' + Doctor.id);
}

async function bulkDelete() {
    if (selectedDoctors.length === 0) {
        Swal.fire({
            title: 'No Doctors Selected',
            text: 'Please select at least one doctor to delete.',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Confirm Bulk Deletion',
        text: 'Are you sure you want to delete selected doctors?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    });

    if (result.isConfirmed) {
        // Proceed with bulk deletion
        for (const doctor of selectedDoctors) {
            await router.delete('/doctors/' + doctor.id);
        }

        // Show success message
        Swal.fire({
            title: 'Deleted!',
            text: 'Selected doctors deleted successfully',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false,
        });

        // Clear selectedDoctors array
        selectedDoctors = [];
    }
}

// Function to toggle selection of a doctor
function toggleSelection(doctor) {
    if (selectedDoctors.includes(doctor)) {
        selectedDoctors = selectedDoctors.filter(item => item !== doctor);
    } else {
        selectedDoctors.push(doctor);
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
        for (const doctor of props.Doctors.data) {
            selectedDoctors.push(doctor);
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
            title: 'No Doctors Selected',
            text: 'Please select at least one doctor to active.',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Confirm Bulk Activation',
        text: 'Are you sure you want to activate selected doctors?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Active'
    });

    if (result.isConfirmed) {
        // Proceed with bulk deletion
        for (const doctor of selectedDoctors) {
            //await router.delete('/doctors/' + doctor.id);
            router.get('/doctorgetApprove/' + doctor.id);
        }

        // Show success message
        Swal.fire({
            title: 'Activated!',
            text: 'Selected doctors activated successfully',
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
            title: 'No Doctors Selected',
            text: 'Please select at least one doctor to Inactive.',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false,
        });
        return;
    }

    const result = await Swal.fire({
        title: 'Confirm Bulk DeActivation',
        text: 'Are you sure you want to Inactivate selected doctors?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Inactive'
    });

    if (result.isConfirmed) {
        // Proceed with bulk deletion
        for (const doctor of selectedDoctors) {
            //await router.delete('/doctors/' + doctor.id);
            router.get('/doctorgetUnApprove/' + doctor.id);
        }

        // Show success message
        Swal.fire({
            title: 'DeActivated!',
            text: 'Selected doctors Deactivated successfully',
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
                    <!-- <button class="btn btn-danger" id="delete_id" style="display: none;">Delete All</button> -->
                    <button class="btn btn-danger" id="delete_id" @click="bulkDelete" style="display: none;">Delete Selected</button>
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
                                Age                                  
                            </th>
                            <th scope="col">
                                Gender                                  
                            </th>
                            <th scope="col">
                                ScheduleDay                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>
                            <th scope="col">
                                Status                                  
                            </th>                       
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>                      
                        <tr v-for="Doctor in Doctors.data" :key="Doctor.id">  
                        <!-- <td v-if="isChecked === 'H'">
                            <div>{{ isChecked }}</div>
                            <input type="checkbox" v-model="selectedDoctors" :value="Doctor"  @change="toggleSelection(Doctor)" class="scheckbox" style="display: none;" />
                        </td>
                        <td v-if="isChecked === 'Y'">
                            <div>{{ isChecked }}</div>
                            <input type="checkbox" v-model="selectedDoctors" :value="Doctor"  @change="toggleSelection(Doctor)" class="scheckbox" style="display: block;" checked/>
                        </td>
                        <td v-else>
                            <div>{{ isChecked }}</div>
                            <input type="checkbox" v-model="selectedDoctors" :value="Doctor"  @change="toggleSelection(Doctor)" class="scheckbox" style="display: block;" />
                        </td> -->
                        <td>
                            <input
                            type="checkbox"
                            v-model="selectedDoctors"
                            :value="Doctor"
                            class="scheckbox"
                            @change="toggleSelection(Doctor)" 
                            :checked="isChecked === 'Y'"
                            style="display: none;"
                        />
                        </td>
                        
                        <td>
                            <img v-if="Doctor.image" :src="'doctor-images/' + Doctor.image" />
                            {{ Doctor.name }}
                        </td>
                        <td>{{ Doctor.email }}</td>
                        <td>{{ Doctor.phone }}</td>
                        <td>{{ Doctor.address }}</td>
                        <td>{{ Doctor.age }}</td>
                        <td v-if="Doctor.gender=='M'">Male</td>
                        <td v-if="Doctor.gender=='F'">FeMale</td>
                        <td v-if="Doctor.gender==''">Male</td>
                        <td>{{ Doctor.day }}</td>
                        <td>{{ Doctor.time }}</td>
                        <td>{{ Doctor.totime }}</td>
                        <td>{{ Doctor.fees }}</td>
                        <td v-if="Doctor.status=='0'">
                            <a href="" class="btn btn-primary" @click.prevent="getActive(Doctor)">Active</a> 
                        </td>
                        <td v-if="Doctor.status=='1'">
                            <a href="" class="btn btn-danger" @click.prevent="getInActive(Doctor)">InActive</a> 
                        </td>
                        <td>
                            <a href="" class="btn btn-primary m-1" @click.prevent="edit(Doctor.id)">Edit</a>
                            <a href="" class="btn btn-danger" @click.prevent="confirmDelete(Doctor)">Delete</a>
                        </td>
                        
                    </tr>                                      
                    </tbody>
                </table>

                <!-- Starts Pagination from here -->
                    <div class="m-2 p-2">
                        <div class="d-flex gap-2">
                            <template v-for="(link,key) in Doctors.links" :key="key">
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



