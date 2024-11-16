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
    const props= defineProps({
        errors:Object,
        data:Object,
        Doctor:Object,
        auth:Object,
    })
    const form = useForm({
            name:props.Doctor.name, 
            address:props.Doctor.address, 
            address:props.Doctor.address, 
            day:props.Doctor.day, 
            phone:props.Doctor.phone, 
            email:props.Doctor.email, 
            time:props.Doctor.time, 
            totime:props.Doctor.totime, 
            age:props.Doctor.age, 
            fees:props.Doctor.fees, 
            gender:props.Doctor.gender, 
            image:null
        });  
        
    function submit(id){
     router.put('/doctors/'+id,form)
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
                <div class="col-10 col-sm-8 col-md-12 m-auto">
                    <div class="card border-0 shadow py-4">
                        <div class="card-body mx-3">
                            <h4 class="text-uppercase text-dark text-left fw-bold fs-5"> Edit Doctor : </h4> 
                            <p class="text-center text-success" v-if="$page.props.flash.success">
                                {{ $page.props.flash.success }}
                            </p>     
                            <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                                {{ $page.props.flash.errormsg }}
                            </p>     
                            <form @submit.prevent="submit(Doctor.id)" enctype="multipart/form-data">
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="name" id="name" v-model="form.name" placeholder="Name" />
                                <p class="text-left text-danger" v-if="errors.name">{{ errors.name }}</p> 

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="address" id="address" v-model="form.address" placeholder="Address" />
                                <p class="text-left text-danger" v-if="errors.address">{{ errors.address }}</p>  
              
                                <select name="day" id="day" class="form-control my-2 py-2 rounded-2 mt-3" v-model="form.day">
                                      <option value="Select Days" > Select Days</option>
                                      <option value="Sunday">Sunday</option>   
                                      <option value="Monday">Monday</option>   
                                      <option value="TuesDay">TuesDay</option>   
                                      <option value="Wednesday">Wednesday</option>   
                                      <option value="Thursday">Thursday</option>   
                                      <option value="Friday">Friday</option>   
                                      <option value="Saturday">Saturday</option>   
                                </select>
                                <p class="text-left text-danger" v-if="errors.day">{{ errors.day }}</p> 

                                <input type="time" class="form-control my-2 py-2 rounded-2 mt-3" name="time" id="time" v-model="form.time" placeholder="Time" />
                                <p class="text-left text-danger" v-if="errors.time">{{ errors.time }}</p>

                                <input type="time" class="form-control my-2 py-2 rounded-2 mt-3" name="totime" id="totime" v-model="form.totime" placeholder="Time" />
                                <p class="text-left text-danger" v-if="errors.totime">{{ errors.totime }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="email" id="email" v-model="form.email" placeholder="Email" />
                                <p class="text-left text-danger" v-if="errors.email">{{ errors.email }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="phone" id="phone" v-model="form.phone" placeholder="Phone" />
                                <p class="text-left text-danger" v-if="errors.phone">{{ errors.phone }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="age" id="age" v-model="form.age" placeholder="Age" />
                                <p class="text-left text-danger" v-if="errors.age">{{ errors.age }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="fees" id="fees" v-model="form.fees" placeholder="Fees" />
                                <p class="text-left text-danger" v-if="errors.fees">{{ errors.fees }}</p>                   

                                <div class="form-control my-4 py-2">                                
                                    <input type="file" @input="form.image = $event.target.files[0]" name="image"/>
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                    </progress>
                                    <p class="text-left text-danger" v-if="errors.image">{{ errors.image }}</p>
                                </div>

                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1male" value="M"  v-model="form.gender">
                                        <label class="form-check-label" for="gender1male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1female" value="F" v-model="form.gender">
                                        <label class="form-check-label" for="gender1female">
                                            Female
                                        </label>
                                    </div>
                                </div> 
                                <p class="text-left text-danger" v-if="errors.gender">{{ errors.gender }}</p>
                                <button type="submit" class="bg-indigo-600 w-100 text-white mt-3 my-2 py-2">Save</button>
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




