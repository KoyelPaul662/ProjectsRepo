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

    const props=  defineProps({
        errors:Object,
        Specialization:Object,
        auth:Object,
    })
    const form = useForm({
        title:props.Specialization.title, 
      });
  
  function submit(id)
  {
    router.put('/specializations/'+id,form)
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
                            <h4 class="text-uppercase text-dark text-left fw-bold fs-5"> Edit Specialization : </h4>     
                            <form @submit.prevent="submit(Specialization.id)">
                                <input  type="text" class="form-control my-4 py-2 rounded-2" v-model="form.title"/>
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






