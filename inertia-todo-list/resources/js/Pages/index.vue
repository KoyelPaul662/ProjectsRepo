<script setup>
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
defineProps({
    todos:Array,
})
function edit(id) {
    router.get('/todos/'+id+'/edit'); 
}

// function confirmDelete(todo) {
//     router.delete('/todos/'+todo.id); 
// }

async function confirmDelete(todo) {
    const result = await Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this todo?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    });

    if (result.isConfirmed) {
        // Proceed with deletion
        await router.delete('/todos/' + todo.id);
        // Show success message
        Swal.fire({
            title: 'Deleted!',
            text: 'The todo has been deleted.',
            icon: 'success',
            timer:3000,
            showConfirmButton:false,
        });
    }
}
</script>

<template>
    <div class="container mt-5 pt-5">
        <div class="col-10 col-sm-8 col-md-8 m-auto mt-3">
            <table class="table">
                    <thead>
                        <tr>                                     
                            <th scope="col">
                                Content                                 
                            </th>
                                                                        
                            <th scope="col">Action</th>
                        </tr>
                    </thead>                   
                    <tbody>  
                        <tr v-for="todo in todos" :key="todo.id">  
                            <td>{{ todo.content }}</td>
                            <td>
                                <a href="" class="btn btn-primary me-1" @click.prevent="edit(todo.id)">Edit</a>
                                <a href="" class="btn btn-danger" @click.prevent="confirmDelete(todo)">Delete</a>
                            </td>
                            
                        </tr>   
                    </tbody>
                    
            </table> 
            <Link href="/todos" class="px-4 py-2 bg-indigo-600 text-white">Go Back</Link>
        </div>   
    </div>
</template>