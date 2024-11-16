<script setup>
    import UserSidebar from '@/sidebar/usersidebar.vue';
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
        data:Object,
        dataForSpecial:Object,
        auth:Object,
    })
    const form = useForm({
            specialization_id:'Select Specialization',
        });  
        
    function submit(){
        router.post('/new-request',form);
    }   

    function book(id) {
      router.get('/book-request/'+id); 
    }
    const nameheader= props.auth.user.name;
</script>

<template>
     <UserSidebar  />
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
               <Header :nameheader="nameheader"/>
            <!-- end: Navbar -->

            <!-- Start Form    -->
            <div class="container mt-3 pt-3">
                <div class="col-10 col-sm-8 col-md-12 m-auto">
                    <div class="card border-0 shadow py-4">
                        <div class="card-body mx-3">
                            <h4 class="text-uppercase text-dark text-left fw-bold fs-5">Choose Specialization: </h4> 
                            <p class="text-center text-success" v-if="$page.props.flash.success">
                                {{ $page.props.flash.success }}
                            </p>     
                            <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                                {{ $page.props.flash.errormsg }}
                            </p>     
                            <form @submit.prevent="submit">                             
                                <select v-model="form.specialization_id" class="form-control my-2 py-2 rounded-2 mt-3" name="specialization_id">
                                    <option value="Select Specialization" class="text-dark">Select Specialization</option>
                                    <option v-for="datas in data" :key="datas.id" :value="datas.id">{{ datas.title }}</option>
                                </select> 
                                <p class="text-left text-danger" v-if="errors.specialization_id">{{ errors.specialization_id }}</p>                                                                                        
                                <button type="submit" class="bg-indigo-600 w-100 text-white mt-3 my-2 py-2">Save</button>
                            </form>
                        </div>  
                    </div> 
                </div>   
            </div>    
            <!-- End form -->


            <!-- Show Doctors Table Start-->
            <div class="container mt-5" id="beforebulkdiv">                     
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>        
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
                                Time From                              
                            </th>
                            <th scope="col">
                                Time To                              
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                       
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>                      
                        <tr v-for="dataForSp in dataForSpecial" :key="dataForSp.id">                        
                        <td>
                            <img v-if="dataForSp.image" :src="'doctor-images/' + dataForSp.image" style="height: 55px; border-radius: 50%;"/>
                            {{ dataForSp.name }}
                        </td>
                        <td>{{ dataForSp.email }}</td>
                        <td>{{ dataForSp.phone }}</td>
                        <td>{{ dataForSp.address }}</td>
                        <td>{{ dataForSp.age }}</td>
                        <td v-if="dataForSp.gender=='M'">Male</td>
                        <td v-if="dataForSp.gender=='F'">FeMale</td>
                        <td v-if="dataForSp.gender==''">Male</td>
                        <td>{{ dataForSp.day }}</td>
                        <td>{{ dataForSp.time }}</td>
                        <td>{{ dataForSp.totime }}</td>
                        <td>{{ dataForSp.fees }}</td>  
                        <td> <a href="" class="btn btn-primary m-1" @click.prevent="book(dataForSp.id)">Send Request</a></td>                                                            
                    </tr>                                      
                    </tbody>
                </table>
            </div>
            <!-- Show Doctors Table Ends-->
        </div>
    </main>
    <!-- end: Main -->
</template>




