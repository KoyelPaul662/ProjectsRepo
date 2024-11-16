

<template>
    <div class="container mt-5 pt-5">
        <div class="col-10 col-sm-8 col-md-4 m-auto">
            <div class="card border-0 shadow py-4">
                <div class="card-body mx-3">
                    <h4 class="text-uppercase text-dark text-left fw-bold text-center fs-2"> ToDo App</h4>     
                    <form action="">
                        <!-- {{ todos }} -->
                        <input type="text" class="form-control my-4 py-2 rounded-2" name="content" id="content" v-model="form.content" placeholder="Write Here" />
                     
                        <button type="submit" class="btn btn-primary w-100 mt-2 text-dark" @click="submit">Save</button>
                    </form>
                </div>  
            </div> 
        </div>   
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
                                <a href="" class="btn btn-primary me-1" @click="edit(todo)">Edit</a>
                                <a href="" class="btn btn-danger" @click="confirmDelete(todo)">Delete</a>
                            </td>
                            
                        </tr>   
                    </tbody>
            </table> 
        </div>      
    </div>    
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue';
export default {
props:{
    todos:Array,
},
setup() {
const form = reactive({
  content: null,
});

 function submit() {
  if (form.content !== null) {
     Inertia.post('/todos', form);
  }
}

function edit(todo) {
    Inertia.visit(`/todos/edit/${todo.id}`); 
}

function confirmDelete(todo) {
    Inertia.delete('/todos/'+todo.id); 
}

return {
  form,
  submit,
  edit,
  confirmDelete,
};
},
};
</script>
