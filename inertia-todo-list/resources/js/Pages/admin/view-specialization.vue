<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import Swal from 'sweetalert2'

onMounted(() => {
  initExternalScript();
});

const props=defineProps({
    Specializations:Array,
    auth:Object,
})
function edit(id) {
    router.get('/specializations/'+id+'/edit'); 
}

// function confirmDelete(todo) {
//     router.delete('/todos/'+todo.id); 
// }

async function confirmDelete(Specialization) {
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
        await router.delete('/specializations/' + Specialization.id);
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
                    <table class="table table-striped mt-5">
                        <thead>
                            <tr>                
                                <th scope="col">
                                    Specialization                                 
                                </th>                                                      
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>                      
                            <tr v-for="Specialization in Specializations" :key="Specialization.id">  
                            <td>{{ Specialization.title }}</td>
                            <td>
                                <a href="" class="btn btn-primary me-1" @click.prevent="edit(Specialization.id)">Edit</a>
                                <a href="" class="btn btn-danger" @click.prevent="confirmDelete(Specialization)">Delete</a>
                            </td>
                            
                        </tr>                                      
                        </tbody>
                    </table>
                </div>
            <!-- end: Navbar -->
        </div>
    </main>
    <!-- end: Main -->
</template>





