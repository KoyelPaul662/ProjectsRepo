

<template>
    <div class="container mt-5 pt-5">
        <div class="col-10 col-sm-8 col-md-4 m-auto">
            <div class="card border-0 shadow py-4">
                <div class="card-body mx-3">
                    <h4 class="text-uppercase text-dark text-left fw-bold text-center fs-2"> ToDo App</h4>     
                    <form @submit.prevent="submit">
                        <input type="text" class="form-control my-2 py-2 rounded-2" name="content" id="content" v-model="form.content" placeholder="Write Here" />
                        <p class="text-left text-danger" v-if="errors.content">{{ errors.content }}</p>                  
                        <button type="submit" class="btn btn-primary w-100 mt-2 text-dark">Save</button>
                    </form>
                </div>  
            </div> 
        </div>   
    </div>    
</template>

<script setup>
    import { useForm} from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    defineProps({
        errors:Object,
    })
    const form = useForm({
            content:null, 
            });

    function submit()
    {
    router.post('/todos',form);
    }     
</script>

<style src="../../../public/css/styles.css" scoped></style>
