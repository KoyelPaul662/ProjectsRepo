<template>
    <div class="container mt-5 pt-5">
        <div class="col-10 col-sm-8 col-md-4 m-auto">
            <div class="card border-0 shadow py-4">
                <div class="card-body mx-3">
                    <h4 class="text-uppercase text-dark text-center fw-bold my-2 fs-3">Sign Up</h4> 
                    <p class="text-center text-success" v-if="$page.props.flash.success">
                        {{ $page.props.flash.success }}
                    </p>     
                    <p class="text-center text-danger" v-if="$page.props.flash.errormsg">
                        {{ $page.props.flash.errormsg }}
                    </p>                                
                    <form @submit.prevent="submit">
                        <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="name" id="name" v-model="form.name" placeholder="Name" />
                        <p class="text-left text-danger" v-if="errors.name">{{ errors.name }}</p> 

                        <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="address" id="address" v-model="form.address" placeholder="Address" />
                        <p class="text-left text-danger" v-if="errors.address">{{ errors.address }}</p>  

                        <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="email" id="email" v-model="form.email" placeholder="Email" />
                        <p class="text-left text-danger" v-if="errors.email">{{ errors.email }}</p>

                        <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="phone" id="phone" v-model="form.phone" placeholder="Phone" />
                        <p class="text-left text-danger" v-if="errors.phone">{{ errors.phone }}</p>

                        <input type="password" class="form-control my-2 py-2 rounded-2 mt-3" name="password" id="password" v-model="form.password" placeholder="Password" />
                        <p class="text-left text-danger" v-if="errors.password">{{ errors.password }}</p>

                        <input type="text" class="form-control my-2 py-2 rounded-2 mt-3" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password" />
                        <p class="text-left text-danger" v-if="errors.password_confirmation">{{ errors.password_confirmation }}</p>

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
                        <button type="submit" class="bg-indigo-600 w-100 text-white mt-3 my-2 py-2">Sign Up</button>
                    </form>
                    <p class="text-dark fw-bold mt-1 text-muted">Already have an account?? <a href="#" class="text-decoration-none" @click.prevent="login()" >Log In</a></p>
                </div>
            </div>
        </div>
    </div>   
</template>

<script setup>
    import { useForm} from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    const props= defineProps({
        errors:Object,
    })
    const form = useForm({
            name:null, 
            address:null, 
            phone:null,
            email:null,
            password:null,
            password_confirmation:null,
            gender: 'M',
        });

    function submit(){
        router.post('/registration',form);
        form.name=null;
        form.address=null;
        form.phone=null;
        form.email=null;
        form.password=null;
        form.password_confirmation=null;
        form.gender=null;
    }   
    function login(){
     router.get('/');
    }  
</script>


