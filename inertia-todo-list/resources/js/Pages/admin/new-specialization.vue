<script setup>
    import AdminSidebar from '@/sidebar/adminsidebar.vue';
    import Header from '@/header/header.vue';
    import { useForm} from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    import { onMounted } from 'vue';
    import { initExternalScript } from '../../../../public/js/script';
    onMounted(() => {
    initExternalScript();
    });

    const props=defineProps({
        errors:Object,
        auth:Object,
    })
    const form = useForm({
                title:null, 
            });          
    function submit(){
    router.post('/new-specialization',form);
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

            <!-- Start Form    -->
            <div class="container mt-3 pt-3">
                <div class="col-10 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow py-4">
                        <div class="card-body mx-3">
                            <h4 class="text-uppercase text-dark text-left fw-bold fs-5"> Specialization : </h4> 
                            <p class="text-center text-success" v-if="$page.props.flash.success">
                                {{ $page.props.flash.success }}
                            </p>     
                            <form @submit.prevent="submit">
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="title" id="title" v-model="form.title" placeholder="Specialization" />
                                <p class="text-left text-danger" v-if="errors.title">{{ errors.title }}</p>                  
                                <button type="submit" class="btn btn-primary w-100 text-dark mt-3">Save</button>
                            </form>
                        </div>  
                    </div> 
                </div>   
            </div>    
            <!-- End form -->
        </div>
    </main>
    <!-- end: Main -->
</template>






