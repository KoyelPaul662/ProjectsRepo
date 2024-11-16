<script setup>
import { useForm} from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props= defineProps({
  todo:Object,
})

const form = useForm({
        content:props.todo.content, 
      });
  
  function submit(id)
  {
    router.put('/todos/'+id,form)
  }
</script>
<template>
    <div class="col-10 col-sm-8 col-md-4 m-auto mt-5 pt-5">
      <div class="card border-0 shadow py-4">
          <div class="card-body mx-3">
              <h4 class="text-uppercase text-dark text-left fw -bold text-center fs-2"> Edit Todo</h4>
                  <form @submit.prevent="submit(todo.id)">
                      <input  type="text" class="form-control my-4 py-2 rounded-2" v-model="form.content"/>
                      <button type="submit" class="btn btn-primary w-100 mt-2 text-dark">Update</button>
                  </form>
              </div>
          </div>
    </div>        
  </template>

