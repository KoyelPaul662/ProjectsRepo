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
    const props= defineProps({
        errors:Object,
        doctorid:Object,
        Doctor:Object,
        auth:Object,
    })
    const form = useForm({
            doctorname:props.doctorid.name, 
            doctorid:props.doctorid.id, 
            doctorday:props.doctorid.day, 
            doctortime:props.doctorid.time, 
            specialization_id:props.doctorid.specialization_id, 
            totime:props.doctorid.totime,
            email:props.auth.user.email,  
            doctorfees:props.doctorid.fees, 
            session:props.auth.user.id,
            name:'',
            phone:'',
            alternatephone:'',
            age:'',
            gender:'M',
        });  
        
    function submit(){
     router.post('/send-request',form);
    }   
    function goBack() {
     window.history.back();
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
                            <div class="d-flex justify-content-between">
                                <h4 class="text-uppercase text-dark text-left fw-bold">Book Appointment:</h4>
                                <a href="#" class="btn btn-primary" @click.prevent="goBack()">Go Back</a>
                            </div>
                            <p class="text-center text-success" v-if="$page.props.flash.success">
                                {{ $page.props.flash.success }}
                            </p>     
                            <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                                {{ $page.props.flash.errormsg }}
                            </p>     
                            <form @submit.prevent="submit">
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="name" id="name" v-model="form.doctorname" placeholder="Name" />
                                <p class="text-left text-danger" v-if="errors.doctorname">{{ errors.doctorname }}</p> 

                                <input type="hidden" class="form-control my-2 py-2 rounded-2 mt-3" name="doctorid" id="doctorid" v-model="form.doctorid" placeholder="doctorid" />
                                <p class="text-left text-danger" v-if="errors.doctorid">{{ errors.doctorid }}</p>

                                
                                <input type="hidden" class="form-control my-2 py-2 rounded-2 mt-3" name="specialization_id" id="specialization_id" v-model="form.specialization_id" placeholder="Specialization Id" />
                                <p class="text-left text-danger" v-if="errors.specialization_id">{{ errors.specialization_id }}</p>

                                <input type="hidden" class="form-control my-2 py-2 rounded-2 mt-3" name="email" id="email" v-model="form.email" placeholder="Email" />
                                <p class="text-left text-danger" v-if="errors.email">{{ errors.email }}</p>
                                
                                <input type="hidden" class="form-control my-2 py-2 rounded-2 mt-3" name="name" id="name" v-model="form.session" placeholder="Name" />
                                <p class="text-left text-danger" v-if="errors.session">{{ errors.session }}</p> 

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="doctorday" id="doctorday" v-model="form.doctorday" placeholder="Day" />
                                <p class="text-left text-danger" v-if="errors.doctorday">{{ errors.doctorday }}</p> 

                                <label for="">Time From:</label>
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="doctortime" id="doctortime" v-model="form.doctortime" placeholder="Time From" />
                                <p class="text-left text-danger" v-if="errors.doctortime">{{ errors.doctortime }}</p> 

                                <label for="">Time To</label>
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="totime" id="totime" v-model="form.totime" placeholder="Time To" />
                                <p class="text-left text-danger" v-if="errors.totime">{{ errors.totime }}</p> 

                                <label for="">Fees:</label>
                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="fees" id="fees" v-model="form.doctorfees" placeholder="Fees" />
                                <p class="text-left text-danger" v-if="errors.doctorfees">{{ errors.doctorfees }}</p>  
 

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="name" id="name" v-model="form.name" placeholder="Name" />
                                <p class="text-left text-danger" v-if="errors.name">{{ errors.name }}</p>                             

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="phone" id="phone" v-model="form.phone" placeholder="Phone" />
                                <p class="text-left text-danger" v-if="errors.phone">{{ errors.phone }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="alternatephone" id="Alternate phone" v-model="form.alternatephone" placeholder="Alternate Phone" />
                                <p class="text-left text-danger" v-if="errors.alternatephone">{{ errors.alternatephone }}</p>

                                <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="age" id="age" v-model="form.age" placeholder="Age" />
                                <p class="text-left text-danger" v-if="errors.age">{{ errors.age }}</p>

                                                 

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




