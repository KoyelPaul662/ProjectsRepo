<script setup>
import AdminSidebar from '@/sidebar/adminsidebar.vue';
import Header from '@/header/header.vue';
import { onMounted } from 'vue';
import { initExternalScript } from '../../../../public/js/script';
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';
import Swal from 'sweetalert2'

onMounted(() => {
  initExternalScript();
});

const props= defineProps({
    Sundayrecord:Array,
    Mondayrecord:Array,
    TuesDayrecord:Array,
    Wednesdayrecord:Array,
    Thursdayrecord:Array,
    Fridayrecord:Array,
    Saturdayrecord:Array,
    auth:Object,
    // selectAllChecked:false,
})
async function getApprove(data) {
    router.get('/getApprove/' + data.id);
}

async function getReject(data) {
    router.get('/getReject/' + data.id);
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

            <!-- Show Sunday Schedule div starts from here -->
            <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Sunday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Sundayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
            </div>
            <!-- Show Sunday Schedule div ends from here -->

            <!-- Show Monday Schedule div starts from here -->
            <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Monday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Mondayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
            </div>
            <!-- Show Monday Schedule div ends from here -->

            <!-- Show Tuesday Schedule div starts from here -->
            <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Tuesday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in TuesDayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
            </div>
            <!-- Show Tuesday Schedule div ends from here -->

            <!-- Show WednesDay Schedule div starts from here -->
            <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">WednesDay:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Wednesdayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
            </div>
            <!-- Show WednesDay Schedule div ends from here -->


            <!-- Show Thursday Schedule div starts from here -->
             <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Thursday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Thursdayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
             </div>
            <!-- Show Thursday Schedule div ends from here -->

            <!-- Show Friday Schedule div starts from here -->
              <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Friday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Fridayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
              </div>
            <!-- Show Friday Schedule div ends from here -->


            <!-- Show Saturday Schedule div starts from here -->
            <div class="container mt-5" id="beforebulkdiv"> 
                <h5 class="alltextcolor fw-bold text-uppercase">Saturday:</h5>                      
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>       
                            <th scope="col">
                                Doctor                                 
                            </th>
                                
                            <th scope="col">
                                Specialization                                
                            </th>
                            <th scope="col">
                                Fees                                  
                            </th>                              
                            <th scope="col">
                                Schedule&nbsp;Day                                  
                            </th>
                            <th scope="col">
                                Time&nbsp;From                                
                            </th>
                            <th scope="col">
                                Time&nbsp;To                                
                            </th>                                                     
                        </tr>
                    </thead>    

                    <tbody>                      
                        <tr v-for="data in Saturdayrecord" :key="data.id">                                        
                            <td>
                                <img v-if="data.image" :src="'doctor-images/' + data.image" />
                                {{ data.name }}
                            </td>
                            <td>{{ data.specialization.title }}</td>
                            <td>{{ data.fees }}</td>
                            <td>{{ data.day }}</td>
                            <td>{{ data.time }}</td>
                            <td>{{ data.totime}}</td>                                         
                        </tr>                                      
                    </tbody>
                </table>
              </div>
            <!-- Show Saturday Schedule div ends from here -->

            <!-- end: Navbar -->
        </div>
    </main>
    <!-- end: Main -->
</template>

<style>       
img {
  height: 30px;
  border-radius: 50%;
  margin: 3px;
}
</style> 






